<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller; // Ensure this is the Laravel base Controller
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeRequest;
use App\Models\User;

class SeekerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // This should now work with the correct Controller
    }

    public function dashboard()
    {
        $requests = TimeRequest::where('user_id', Auth::id())
            ->with(['donor', 'messages' => function($q) {
                $q->orderBy('created_at', 'desc')->limit(1);
            }])
            ->get();
        return view('dashboards.seeker', compact('requests'));
    }

    public function timeRequests()
    {
        $requests = TimeRequest::where('user_id', Auth::id())->get();
        return view('seeker.time_requests.index', compact('requests'));
    }

    public function createTimeRequest()
    {
        return view('seeker.time_requests.create');
    }

    public function storeTimeRequest(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requested_time' => 'required|date',
        ]);

        TimeRequest::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'requested_time' => $request->requested_time,
            'status' => 'pending',
        ]);

        return redirect()->route('seeker.time_requests.index')->with('success', 'Request created successfully.');
    }

    public function donorsList()
    {
        $donors = User::where('role', 'donor')->get();
        return view('seeker.donors.index', compact('donors'));
    }

    public function showDonor($id)
    {
        $donor = User::where('role', 'donor')->findOrFail($id);
        return view('seeker.donors.show', compact('donor'));
    }

    public function chat($timeRequest)
    {
        $timeRequest = TimeRequest::findOrFail($timeRequest);
        if ($timeRequest->user_id !== Auth::id()) {
            return redirect()->route('seeker.dashboard')->with('error', 'Unauthorized access.');
        }
        return view('seeker.chat', compact('timeRequest'));
    }
}