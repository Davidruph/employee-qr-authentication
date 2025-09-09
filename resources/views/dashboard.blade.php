<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Total Employees</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $totalEmployees }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Active</h3>
                    <p class="mt-2 text-3xl font-bold text-green-600">{{ $activeEmployees }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Inactive</h3>
                    <p class="mt-2 text-3xl font-bold text-red-600">{{ $inactiveEmployees }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-700">Verifications Today</h3>
                    <p class="mt-2 text-3xl font-bold text-blue-600">{{ $verificationsToday }}</p>
                </div>
            </div>

            <!-- Recent Verifications -->
            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Verifications</h3>
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Employee</th>
                            {{-- <th class="px-4 py-2">Status</th> --}}
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentLogs as $log)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $log->employee->full_name }}</td>
                                {{-- <td class="px-4 py-2">
                                    <span
                                        class="px-2 py-1 rounded text-xs font-medium
                                        {{ $log->status === 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $log->status }}
                                    </span>
                                </td> --}}
                                <td class="px-4 py-2">{{ $log->created_at->format('d M, Y h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
