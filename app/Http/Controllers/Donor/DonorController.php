<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeRequest;

class DonorController extends Controller
{
    public function dashboard()
    {
        return view('dashboards.donor');
    }

    // Module 1: My Donations
    public function myDonations()
    {
        $donations = TimeRequest::where('donor_id', Auth::id())->get();
        return view('donor.my_donations', compact('donations'));
    }

    // Module 2: Seeker Requests
    public function seekerRequests()
    {
        $requests = TimeRequest::whereNull('donor_id')->get();
        return view('donor.seeker_requests', compact('requests'));
    }

    // Module 3: Chat
    public function chat()
    {
        return view('donor.chat');
    }
}
