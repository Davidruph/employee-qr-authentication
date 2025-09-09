<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4">
                        <h2 class="text-2xl font-semibold mb-4">Employees</h2>

                        <div class="mb-4 flex justify-end">
                            <x-primary-button>
                                <a href="{{ route('employees.create') }}" class="text-white">+ Add Employee</a>
                            </x-primary-button>
                        </div>

                        @if (session('success'))
                            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="overflow-x-auto bg-white shadow rounded-lg">
                            <table class="min-w-full border-collapse">
                                <thead class="bg-gray-100 text-left">
                                    <tr>
                                        <th class="px-4 py-2 border-b">Photo</th>
                                        <th class="px-4 py-2 border-b">Name</th>
                                        <th class="px-4 py-2 border-b">Email</th>
                                        <th class="px-4 py-2 border-b">Department</th>
                                        <th class="px-4 py-2 border-b">Status</th>
                                        <th class="px-4 py-2 border-b">QR</th>
                                        <th class="px-4 py-2 border-b">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 border-b">
                                                <img src="{{ asset('storage/' . $employee->photo) }}"
                                                    class="w-12 h-12 object-cover rounded-full" alt="Employee Photo">
                                            </td>
                                            <td class="px-4 py-2 border-b">
                                                {{ $employee->first_name }} {{ $employee->full_name }}
                                            </td>
                                            <td class="px-4 py-2 border-b">{{ $employee->email }}</td>
                                            <td class="px-4 py-2 border-b">{{ $employee->department }}</td>
                                            <td class="px-4 py-2 border-b">
                                                <span
                                                    class="px-2 py-1 text-xs font-medium rounded-full 
                                {{ $employee->status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $employee->status }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-2 border-b">
                                                <a href="{{ route('employees.qrcode', $employee->id) }}"
                                                    class="inline-block px-3 py-1 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">
                                                    View QR
                                                </a>
                                            </td>
                                            <td class="px-4 py-2 border-b">
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="inline-block px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('employees.destroy', $employee->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Delete employee?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $employees->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
