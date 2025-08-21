<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeRequest;
use App\Models\User;

class SeekerController extends Controller
{
    public function dashboard()
    {
        return view('dashboards.seeker');
    }

    // Module 1: My Time Requests
    public function timeRequests()
    {
        $requests = TimeRequest::where('user_id', Auth::id())->get();
        return view('seeker.time_requests.index', compact('requests'));
    }

    // Module 2: Create Time Request
    public function createTimeRequest()
    {
        return view('seeker.time_requests.create');
    }

    public function storeTimeRequest(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requested_time' => 'required|date',
        ]);

        TimeRequest::create([
            'title' => $request->title,
            'description' => $request->description,
            'requested_time' => $request->requested_time,
            'user_id' => Auth::id(),
            'status' => 'Pending',
        ]);

        return redirect()->route('seeker.time_requests.index');
    }

    // Module 3: Donors list
    public function donorsList()
    {
        $donors = User::where('role', 'donor')->get();
        return view('seeker.donors.index', compact('donors'));
    }

    public function showDonor($id)
    {
        $donor = User::findOrFail($id);
        return view('seeker.donors.show', compact('donor'));
    }

    // Module 4: Chat
    public function chat()
    {
        return view('seeker.chat');
    }
}
