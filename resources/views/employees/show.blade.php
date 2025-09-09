<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">

                    <div class="flex items-center gap-6">
                        <img src="{{ $employee->photo ? asset('storage/' . $employee->photo) : asset('images/default-avatar.png') }}"
                            alt="Employee Photo" class="w-28 h-28 rounded-full object-cover border border-gray-300">

                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $employee->full_name }}</h3>
                            <p class="text-gray-600">{{ $employee->position }} - {{ $employee->department }}</p>
                            <span
                                class="px-3 py-1 text-sm rounded-full 
                                {{ $employee->status === 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $employee->status }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <h4 class="font-semibold text-gray-700">Contact Information</h4>
                            <p><span class="font-medium">Email:</span> {{ $employee->email }}</p>
                            <p><span class="font-medium">Phone:</span> {{ $employee->phone }}</p>
                            <p><span class="font-medium">Address:</span> {{ $employee->address }}</p>
                        </div>

                        <div class="space-y-2">
                            <h4 class="font-semibold text-gray-700">Employment Details</h4>
                            <p><span class="font-medium">Date of Birth:</span> {{ $employee->date_of_birth }}</p>
                            <p><span class="font-medium">Hire Date:</span> {{ $employee->hire_date }}</p>
                            <p><span class="font-medium">Department:</span> {{ $employee->department }}</p>
                            <p><span class="font-medium">Position:</span> {{ $employee->position }}</p>
                        </div>
                    </div>

                    <div class="mt-8 flex gap-3">
                        <a href="{{ route('employees.edit', $employee->id) }}"
                            class="px-4 py-2 bg-indigo-600 text-white text-sm rounded-md shadow hover:bg-indigo-700">
                            Edit
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this employee?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white text-sm rounded-md shadow hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('employees.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white text-sm rounded-md shadow hover:bg-gray-600">
                            Back
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
