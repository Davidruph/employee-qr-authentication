<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('employees.update', $employee->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="flex flex-col lg:flex-row gap-3 w-full mb-3">
                            <div class="w-full">
                                <x-input-label for="full_name" :value="__('Full Name')" />
                                <x-text-input id="full_name" class="block mt-1 w-full" type="text" name="full_name"
                                    :value="old('full_name', $employee->full_name)" required autofocus autocomplete="off" />
                                <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                    :value="old('email', $employee->email)" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                    :value="old('phone', $employee->phone)" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-3 w-full mb-3">
                            <div class="w-full">
                                <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                                <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date"
                                    name="date_of_birth" :value="old('date_of_birth', $employee->date_of_birth)" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="hire_date" :value="__('Hire Date')" />
                                <x-text-input id="hire_date" class="block mt-1 w-full" type="date" name="hire_date"
                                    :value="old('hire_date', $employee->hire_date)" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('hire_date')" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-input-label for="position" :value="__('Position')" />
                                <x-text-input id="position" class="block mt-1 w-full" type="text" name="position"
                                    :value="old('position', $employee->position)" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('position')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-3 w-full mb-3">
                            <div class="w-full">
                                <x-input-label for="department" :value="__('Department')" />
                                <x-select id="department" name="department" :options="[
                                    'Executive Branch' => 'Executive Branch',
                                    'Response & Recovery' => 'Response & Recovery',
                                    'Managerial Branch' => 'Managerial Branch',
                                ]" :selected="old('department', $employee->department)" />
                                <x-input-error :messages="$errors->get('department')" class="mt-2" />
                            </div>

                            <div class="w-full">
                                <x-input-label for="status" :value="__('Status')" />
                                <x-select id="status" name="status" :options="[
                                    'Active' => 'Active',
                                    'Inactive' => 'Inactive',
                                    'Suspended' => 'Suspended',
                                    'Leave' => 'Leave',
                                    'Terminated' => 'Terminated',
                                ]" :selected="old('status', $employee->status)" />
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <div class="w-full">
                                <x-input-label for="employee_id" :value="__('Employee ID')" />
                                <x-text-input id="employee_id" class="block mt-1 w-full" type="text"
                                    name="employee_id" :value="old('employee_id', $employee->employee_id)" autocomplete="off" />
                                <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-3 w-full mb-3">
                            <div class="w-full">
                                <x-input-label for="work_status" :value="__('Work Status')" />
                                <x-select id="work_status" name="work_status" :options="[
                                    'Citizen / Permanent Resident' => 'Citizen / Permanent Resident',
                                    'Work Visa' => 'Work Visa',
                                    'Student Visa' => 'Student Visa',
                                    'Dependent Visa' => 'Dependent Visa',
                                    'Temporary / Contract Worker' => 'Temporary / Contract Worker',
                                    'Unemployed / Not Working' => 'Unemployed / Not Working',
                                    'Other' => 'Other',
                                ]" :selected="old('work_status', $employee->work_status)" />
                                <x-input-error :messages="$errors->get('work_status')" class="mt-2" />
                            </div>

                            <div class="w-full">
                                <x-input-label for="government_id_number" :value="__('Government ID Number')" />
                                <x-text-input id="government_id_number" class="block mt-1 w-full" type="text"
                                    name="government_id_number" :value="old('government_id_number', $employee->government_id_number)" autocomplete="off" />
                                <x-input-error :messages="$errors->get('government_id_number')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-3 w-full mb-3">
                            <div class="w-full">
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                    :value="old('address', $employee->address)" autocomplete="off" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex w-full mb-3">
                            <div class="w-full">
                                <x-input-label for="photo" :value="__('Photo')" />
                                <input type="file" id="photo" name="photo"
                                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                @if ($employee->photo)
                                    <img src="{{ asset($employee->photo) }}"
                                        class="w-16 h-16 mt-2 object-cover rounded-full" alt="Employee Photo">
                                @endif
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-3 w-full">
                            <div class="w-full">
                                <x-input-label for="notes" :value="__('Notes')" />
                                <x-textarea id="notes" name="notes" rows="3" :value="old('notes', $employee->notes)" />
                                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                            </div>
                        </div>

                        <x-primary-button class="mt-3">
                            {{ __('Update Employee') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
