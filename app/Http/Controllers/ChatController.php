<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\TimeRequest;

class ChatController extends Controller
{
    public function fetch($timeRequest)
    {
        $messages = Message::where('time_request_id', $timeRequest)
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($message) {
                return [
                    'id' => $message->id,
                    'message' => $message->message,
                    'time' => $message->created_at->toDateTimeString(),
                    'is_own' => $message->sender_id === Auth::id(),
                ];
            });
        return response()->json($messages);
    }

    public function send(Request $request, $timeRequest)
    {
        $request->validate(['message' => 'required|string|max:1000']);
        $timeRequest = TimeRequest::findOrFail($timeRequest);

        if (Auth::id() !== $timeRequest->user_id && Auth::id() !== $timeRequest->donor_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $message = Message::create([
            'time_request_id' => $timeRequest->id,
            'sender_id' => Auth::id(),
            'receiver_id' => Auth::id() === $timeRequest->user_id ? $timeRequest->donor_id : $timeRequest->user_id,
            'message' => $request->message
        ]);

        $message->load('sender');
        return response()->json([
            'id' => $message->id,
            'message' => $message->message,
            'time' => $message->created_at->toDateTimeString(),
            'is_own' => true,
        ]);
    }

    public function markAsRead($timeRequest)
    {
        Message::where('time_request_id', $timeRequest)
            ->where('receiver_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    public function getChats()
    {
        $user = Auth::user();
        if ($user->role === 'donor') {
            $chats = TimeRequest::where('donor_id', $user->id)
                ->with(['seeker', 'messages' => function($q) {
                    $q->orderBy('created_at', 'desc')->limit(1);
                }])->get();
        } else {
            $chats = TimeRequest::where('user_id', $user->id)
                ->whereNotNull('donor_id')
                ->with(['donor', 'messages' => function($q) {
                    $q->orderBy('created_at', 'desc')->limit(1);
                }])->get();
        }
        return response()->json($chats);
    }
}