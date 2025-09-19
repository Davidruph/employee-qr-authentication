<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Employee::class],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:500'],
            'date_of_birth' => ['nullable', 'date'],
            'hire_date' => ['nullable', 'date'],
            'position' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:Active,Inactive'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'employee_id' => ['nullable', 'string', 'max:36', 'unique:' . Employee::class],
            'notes' => ['nullable', 'string', 'max:1000'],
            'government_id_number' => ['nullable', 'string', 'max:255'],
            'work_status' => ['nullable', 'string', 'max:255'],
        ]);

        $employee = new Employee();
        $employee->uuid = Str::uuid();
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->hire_date = $request->hire_date;
        $employee->position = $request->position;
        $employee->department = $request->department;
        $employee->employee_id = $request->employee_id;
        $employee->government_id_number = $request->government_id_number;
        $employee->work_status = $request->work_status;
        $employee->notes = $request->notes;
        $employee->status = 'Active';

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('storage/employees');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $filename);

            // Save relative path so you can call asset('storage/employees/...') in Blade
            $employee->photo = 'storage/employees/' . $filename;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:employees,email,' . $employee->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:500'],
            'date_of_birth' => ['nullable', 'date'],
            'hire_date' => ['nullable', 'date'],
            'position' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:Active,Inactive,Suspended,Leave,Terminated'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'employee_id' => ['nullable', 'string', 'max:36', 'unique:employees,employee_id,' . $employee->id],
            'notes' => ['nullable', 'string', 'max:1000'],
            'government_id_number' => ['nullable', 'string', 'max:255'],
            'work_status' => ['nullable', 'string', 'max:20'],
        ]);

        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->hire_date = $request->hire_date;
        $employee->position = $request->position;
        $employee->department = $request->department;
        $employee->employee_id = $request->employee_id;
        $employee->status = $request->status;
        $employee->government_id_number = $request->government_id_number;
        $employee->work_status = $request->work_status;
        $employee->notes = $request->notes;

        if ($request->hasFile('photo')) {
            if ($employee->photo && file_exists(public_path($employee->photo))) {
                unlink(public_path($employee->photo));
            }

            $image = $request->file('photo');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('storage/employees');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $filename);

            $employee->photo = 'storage/employees/' . $filename;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->photo && Storage::disk('public')->exists($employee->photo)) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }
}
