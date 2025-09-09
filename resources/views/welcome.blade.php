<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Employee QR System') }}</title>
    <link rel="icon" href="{{ asset('logo.svg') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('logo.svg') }}" alt="Logo" class="h-10 w-10">
                    <span class="font-bold text-xl text-black">{{ config('app.name', 'Employee QR System') }}</span>
                </div>

                {{-- <h1 class="text-2xl font-bold text-indigo-600">{{ config('app.name', 'Employee QR System') }}</h1> --}}

                <nav class="flex items-center space-x-6">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-sm font-medium text-gray-700 hover:text-indigo-600">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-red-500 hover:underline">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-medium text-gray-700 hover:text-indigo-600">Login</a>
                        <a href="{{ route('register') }}"
                            class="text-sm font-medium text-gray-700 hover:text-indigo-600">Register</a>
                    @endauth
                </nav>
            </div>
        </header>

        <!-- Hero -->
        <section class="flex-grow flex items-center justify-center text-center px-4">
            <div class="max-w-2xl">
                <h2 class="text-4xl font-extrabold mb-4">Secure Employee Verification</h2>
                <p class="text-gray-600 mb-6">Easily verify employees using unique QR codes.
                    Fast, reliable, and secure for your organization.</p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">

                    <a href="{{ route('scanner') }}"
                        class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
                        Verify Employee
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium shadow hover:bg-gray-200 transition">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 bg-gray-100 text-gray-800 rounded-lg font-medium shadow hover:bg-gray-200 transition">
                            Admin Login
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-8 text-center">
                <div class="p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-indigo-600">QR Verification</h3>
                    <p class="text-gray-600 mt-2">Scan and instantly verify employee identity.</p>
                </div>
                <div class="p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-indigo-600">Employee Management</h3>
                    <p class="text-gray-600 mt-2">Admins can create, edit, and manage employee records.</p>
                </div>
                <div class="p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-indigo-600">Verification Logs</h3>
                    <p class="text-gray-600 mt-2">Track all verification attempts with timestamps.</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-100 text-center py-4 text-sm text-gray-600">
            &copy; {{ date('Y') }} {{ config('app.name', 'Employee QR System') }}. All rights reserved.
        </footer>
    </div>
</body>

</html>
