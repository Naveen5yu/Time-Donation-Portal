<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use PDF; 

class AdminController extends Controller
{
    // =========================
    // Admin Dashboard
    // =========================
    public function dashboard()
    {
        $userCount = User::count();
        $reportCount = Report::count(); // dynamic reports count

        return view('dashboards.admin', compact('userCount', 'reportCount'));
    }

    // =========================
    // User Management CRUD
    // =========================
    public function usersIndex()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|string|in:admin,donor,seeker',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function usersEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function usersUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|string|in:admin,donor,seeker',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function usersDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    // =========================
    // Reports Module
    // =========================
    public function reportsIndex()
    {
        $reports = Report::all(); // Get all reports
        return view('admin.reports.index', compact('reports'));
    }

    public function reportsShow($id)
    {
        $report = Report::findOrFail($id); // Get single report
        return view('admin.reports.show', compact('report'));
    }





     // Export Excel
    public function reportsExportExcel()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    }

    // Export PDF
    public function reportsExportPDF()
    {
        $reports = Report::all();
        $pdf = PDF::loadView('admin.reports.pdf', compact('reports'));
        return $pdf->download('reports.pdf');
    }


   

}
