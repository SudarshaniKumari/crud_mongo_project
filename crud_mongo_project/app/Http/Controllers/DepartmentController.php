<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller

{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'dep_no' => 'required|unique:departments',
            'dep_name' => 'required',
            'location' => 'required',
        ]);
    
        // Create a new department with validated data
        Department::create($validated);
    
        // Redirect to departments index with a success message
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }
    
    

    public function show($id)
    {
        $department = Department::find($id);
        if (!$department) return response()->json(['message' => 'Not Found'], 404);

        return response()->json($department);
    }

    

    public function edit($id)
    {
        $department = Department::find($id);
    
        // If department not found, redirect back with an error message
        if (!$department) {
            return redirect()->route('departments.index')->with('error', 'Department not found.');
        }
    
        // Return the edit view with the department data
        return view('departments.edit', compact('department'));
    }


    
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
    
        // If department not found, return an error response
        if (!$department) {
            return redirect()->route('departments.index')->with('error', 'Department not found.');
        }
    
        // Validate the request
        $validated = $request->validate([
            'dep_no' => 'required|unique:departments,dep_no,' . $id,
            'dep_name' => 'required',
            'location' => 'required',
        ]);
    
        // Update the department with the validated data
        $department->update($validated);
    
        // Redirect back to the departments index with a success message
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }



    public function destroy($id)
    {
        $department = Department::find($id);
    
        if (!$department) {
            return redirect()->route('departments.index')->with('error', 'Department not found.');
        }
    
        $department->delete();
    
        // Redirect with success message
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
    
}
