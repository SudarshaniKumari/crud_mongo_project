<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $departmentCount = Department::count();
        $employeeCount = Employee::count();
        return view('dashboard', compact('departmentCount', 'employeeCount'));
    }
}
