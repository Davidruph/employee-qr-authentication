<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\VerificationLog;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($uuid, Request $request)
    {
        $employee = Employee::where('uuid', $uuid)->first();

        if (!$employee || $employee->status !== 'Active') {
            return view('verify-failed');
        }

        // Optional logging
        VerificationLog::create([
            'employee_id' => $employee->id,
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->header('User-Agent'),
        ]);

        return view('verify-success', compact('employee'));
    }
}
