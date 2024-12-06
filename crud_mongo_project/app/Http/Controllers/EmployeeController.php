<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Department;

class EmployeeController extends Controller
{
    // Show all employees
    public function index()
    {
        // Eager load the department for each employee
        $employees = Employee::with('department')->get();

        return view('employees.index', compact('employees'));
    }
    

    // Show create form
    public function create()
    {
        // Fetch all departments from the departments collection
        $departments = Department::all();
    
        // Pass departments to the view
        return view('employees.create', compact('departments'));
    }


    // Store new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_id' => 'required|unique:employees',
            'emp_f_name' => 'required',
            'emp_l_name' => 'required',
            'phone_number' => 'required',
            'job_name' => 'required',
            'department' => 'required',
            'hire_date' => 'required|date',
            'email' => 'required|email|unique:employees',
        ]);

        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }



    // Show employee edit form
    public function edit($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }

        return view('employees.edit', compact('employee'));
    }

    // Update employee information
    public function update(Request $request, $id)
{
    // Find the employee by ID
    $employee = Employee::find($id);

    // If the employee is not found, redirect back with an error message
    if (!$employee) {
        return redirect()->route('employees.index')->with('error', 'Employee not found.');
    }

    // Validate all input fields
    $validated = $request->validate([
        'emp_id' => 'required|unique:employees,emp_id,' . $id,  // Ensure emp_id is unique, except for the current employee
        'emp_f_name' => 'required',
        'emp_l_name' => 'required',
        'phone_number' => 'required',
        'job_name' => 'required',
        'department' => 'required',
        'hire_date' => 'required|date',
        'email' => 'required|email|unique:employees,email,' . $id, // Ensure email is unique, except for the current employee
    ]);

    // Update the employee with the validated data
    $employee->update([
        'emp_id' => $validated['emp_id'],
        'emp_f_name' => $validated['emp_f_name'],
        'emp_l_name' => $validated['emp_l_name'],
        'phone_number' => $validated['phone_number'],
        'job_name' => $validated['job_name'],
        'department' => $validated['department'],
        'hire_date' => $validated['hire_date'],
        'email' => $validated['email'],
    ]);

    // Redirect back with a success message
    return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
}


    // Delete employee
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
