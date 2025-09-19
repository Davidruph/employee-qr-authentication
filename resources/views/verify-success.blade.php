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
    <div
        class="bg-white shadow-2xl rounded-3xl p-8 w-full max-w-md text-center border border-gray-200 transform transition duration-500 hover:scale-105">

        <!-- Employee Photo -->
        <div class="relative w-32 h-32 mx-auto mb-6">
            <img src="{{ asset($employee->photo) }}" alt="Employee Photo"
                class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg">
            <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-green-400 to-green-600 opacity-20"></div>
        </div>

        <!-- Employee Info -->
        <h2 class="text-3xl font-bold text-gray-900">{{ $employee->full_name }}</h2>
        <p class="text-gray-500 mt-2">{{ $employee->position }} &mdash; {{ $employee->department }}</p>
        <p class="text-gray-500 mt-1">Employee ID: <span
                class="font-medium">{{ $employee->employee_id ?? 'N/A' }}</span></p>
        <p class="text-gray-500 mt-1">Government ID: <span
                class="font-medium">{{ $employee->government_id_number ?? 'N/A' }}</span></p>

        <!-- Status Badge -->
        <div class="mt-4 flex justify-center">
            <span
                class="inline-flex items-center px-4 py-1 rounded-full text-sm font-semibold
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
            This employee has been successfully
            <span class="font-semibold text-green-600">verified</span>
            in the company’s centralized database.
        </p>


    </div>
</body>

</html>
