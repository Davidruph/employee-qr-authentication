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
        $filename = $employee->full_name . '-qrcode.png';

        // Generate QR code as an image resource
        $qrData = QrCode::format('png')->size(250)->generate($url);
        $qrImage = imagecreatefromstring($qrData);

        // Create canvas bigger than QR for title + padding
        $padding = 20;
        $title = 'Roots Youth Care Employee Verification';
        $font = 5; // built-in GD font size (1-5)
        $fontWidth = imagefontwidth($font);
        $fontHeight = imagefontheight($font);

        $titleWidth = strlen($title) * $fontWidth;
        $canvasWidth = max(imagesx($qrImage) + $padding * 2, $titleWidth + $padding * 2);
        $canvasHeight = imagesy($qrImage) + $padding * 2 + $fontHeight + 10; // extra 10px for spacing

        $canvas = imagecreatetruecolor($canvasWidth, $canvasHeight);

        // White background
        $white = imagecolorallocate($canvas, 255, 255, 255);
        imagefill($canvas, 0, 0, $white);

        // Draw QR code centered
        $qrX = ($canvasWidth - imagesx($qrImage)) / 2;
        $qrY = $padding + $fontHeight + 10;
        imagecopy($canvas, $qrImage, $qrX, $qrY, 0, 0, imagesx($qrImage), imagesy($qrImage));

        // Draw border around QR
        $black = imagecolorallocate($canvas, 0, 0, 0);
        imagerectangle(
            $canvas,
            $qrX,
            $qrY,
            $qrX + imagesx($qrImage),
            $qrY + imagesy($qrImage),
            $black
        );

        // Draw title above QR centered
        $textX = ($canvasWidth - $titleWidth) / 2;
        $textY = $padding;
        imagestring($canvas, $font, $textX, $textY, $title, $black);

        // Output PNG
        ob_start();
        imagepng($canvas);
        $imageData = ob_get_clean();

        imagedestroy($qrImage);
        imagedestroy($canvas);

        return response($imageData)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', "attachment; filename={$filename}");
    }
}
