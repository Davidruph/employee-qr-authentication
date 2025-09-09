<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class QRCodeController extends Controller
{
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $url = url("/verify/" . $employee->uuid);

        $qr = QrCode::size(250)->generate($url);

        return view('employees.qrcode', compact('employee', 'qr'));
    }

    public function downloadQr(Employee $employee)
    {
        $url = url('/verify/' . $employee->uuid);
        // dd($url);

        // Generate QR as PNG using GD
        $qr = QrCode::format('png')
            ->size(300)
            ->generate($url);

        $filename = $employee->full_name . '-qrcode.png';

        return response($qr)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', "attachment; filename={$filename}");
    }
}
