<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\VerificationLog;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Employee stats
        $totalEmployees   = Employee::count();
        $activeEmployees  = Employee::where('status', 'Active')->count();
        $inactiveEmployees = Employee::where('status', '!=', 'Active')->count();

        // Verifications today
        $verificationsToday = VerificationLog::whereDate('created_at', Carbon::today())->count();

        // Recent 5 verification logs
        $recentLogs = VerificationLog::with('employee')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalEmployees',
            'activeEmployees',
            'inactiveEmployees',
            'verificationsToday',
            'recentLogs'
        ));
    }
}
