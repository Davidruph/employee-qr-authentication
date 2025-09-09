<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee QR Code') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">

                <!-- Employee Info -->
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold text-gray-900">{{ $employee->full_name }}</h3>
                    <p class="text-gray-600">{{ $employee->position }} - {{ $employee->department }}</p>
                </div>

                <!-- QR Code -->
                <div class="flex justify-center mb-6">
                    {!! $qr !!}
                </div>

                <!-- Verification Link -->
                <p class="text-gray-700 mb-4">
                    Scan this QR code or click the link below to verify:
                </p>
                <a href="{{ url('/verify/' . $employee->uuid) }}" class="text-indigo-600 hover:underline break-all">
                    {{ url('/verify/' . $employee->uuid) }}
                </a>

                <a href="{{ route('employees.qr.download', $employee) }}"
                    class="mt-3 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded inline-block">
                    Download QR Code
                </a>


                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('employees.index') }}"
                        class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">
                        ← Back to Employees
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
