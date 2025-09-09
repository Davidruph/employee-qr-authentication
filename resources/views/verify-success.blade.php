<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Verification</title>
    <link rel="icon" href="{{ asset('logo.svg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-xl rounded-3xl p-8 w-full max-w-md text-center border border-gray-100">

        <!-- Employee Photo -->
        <div class="relative w-32 h-32 mx-auto mb-6">
            <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo"
                class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-md">
            <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-green-400 to-green-600 opacity-20"></div>
        </div>

        <!-- Employee Info -->
        <h2 class="text-2xl font-bold text-gray-900">{{ $employee->full_name }}</h2>
        <p class="text-gray-500 mt-1">{{ $employee->position }} — {{ $employee->department }}</p>

        <!-- Status Badge -->
        <div class="mt-4">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                {{ $employee->status === 'Active'
                    ? 'bg-green-100 text-green-700 ring-1 ring-green-200'
                    : 'bg-red-100 text-red-700 ring-1 ring-red-200' }}">
                <span
                    class="w-2 h-2 mr-2 rounded-full {{ $employee->status === 'Active' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                {{ $employee->status }}
            </span>
        </div>

        <!-- Verification Text -->
        <p class="mt-6 text-gray-600 leading-relaxed">
            This employee has been successfully <span class="font-semibold text-green-600">verified</span>
            in the company’s centralized database system.
        </p>
    </div>
</body>

</html>
