<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeRequest;
use App\Models\Message;
use App\Models\User;

class DonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $donations = TimeRequest::where('donor_id', Auth::id())
            ->with(['seeker', 'messages' => function($q) {
                $q->orderBy('created_at', 'desc')->limit(1);
            }])
            ->get();
        return view('dashboards.donor', compact('donations'));
    }

    public function myDonations()
    {
        $donations = TimeRequest::where('donor_id', Auth::id())->get();
        return view('donor.my_donations', compact('donations'));
    }

    public function seekerRequests()
    {
        $rejectedRequestIds = Auth::user()->rejectedTimeRequests()->pluck('time_request_id')->toArray();
        
        $requests = TimeRequest::whereNull('donor_id')
            ->where('status', 'pending')
            ->whereNotIn('id', $rejectedRequestIds)
            ->with('seeker')
            ->get();
        return view('donor.seeker_requests', compact('requests'));
    }

    public function acceptRequest(Request $request, $id)
    {
        $timeRequest = TimeRequest::where('id', $id)
            ->whereNull('donor_id')
            ->where('status', 'pending')
            ->firstOrFail();

        $timeRequest->update([
            'donor_id' => Auth::id(),
            'status' => 'accepted',
        ]);

        // Create initial message to notify seeker
        Message::create([
            'time_request_id' => $timeRequest->id,
            'sender_id' => Auth::id(),
            'receiver_id' => $timeRequest->user_id,
            'message' => 'I have accepted your time request. Let’s discuss further!',
            'is_read' => false,
        ]);

        return redirect()->route('donor.chat', $timeRequest->id)
            ->with('success', 'Request accepted successfully. Chat started.');
    }

    public function rejectRequest(Request $request, $id)
    {
        $timeRequest = TimeRequest::where('id', $id)
            ->whereNull('donor_id')
            ->where('status', 'pending')
            ->firstOrFail();

        // Record rejection in pivot table
        Auth::user()->rejectedTimeRequests()->attach($timeRequest->id, [
            'action' => 'rejected',
        ]);

        return redirect()->route('donor.seeker_requests')
            ->with('success', 'Request rejected successfully.');
    }

    public function chat($timeRequest)
    {
        $timeRequest = TimeRequest::where('id', $timeRequest)
            ->where('donor_id', Auth::id())
            ->firstOrFail();
        return view('donor.chat', compact('timeRequest'));
    }
}