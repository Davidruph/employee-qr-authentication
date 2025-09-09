<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Failed</title>
    <link rel="icon" href="{{ asset('logo.svg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-xl rounded-3xl p-8 w-full max-w-md text-center border border-gray-100">

        <!-- Error Icon -->
        <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-red-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600" fill="currentColor"
                viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 0 0-.708.708L7.293 8l-2.647 2.646a.5.5
                0 0 0 .708.708L8 8.707l2.646 2.647a.5.5
                0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5
                0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900">Verification Failed</h2>

        <!-- Message -->
        <p class="mt-3 text-gray-600 leading-relaxed">
            This QR code is <span class="text-red-600 font-medium">invalid</span>
            or the employee record is <span class="text-red-600 font-medium">inactive</span>.
        </p>
    </div>
</body>

</html>
