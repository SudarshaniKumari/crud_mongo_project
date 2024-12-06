@extends('layouts/user')

@section('content')
<div class="app-content my-3 my-md-5">
    <div class="side-app">
        <div class="page-header"></div>
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Employee List</h1>
                <div class="d-flex align-items-center">

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Add Employee Button -->
                    <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
                </div>
            </div>


            @if($employees->isNotEmpty())
            <div class="card shadow mb-4">
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered table-hover table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Emp ID</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">First Name</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Last Name</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Job Title</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Email</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Hire Date</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td class="text-center" style="padding: 4px;">{{ $employee->emp_id }}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $employee->emp_f_name }}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $employee->emp_l_name }}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $employee->job_name }}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $employee->email}}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $employee->hire_date }}</td>
                                   
                                    <td class="text-center" style="padding: 4px;">
                                        <a href="" class="btn btn-primary btn-sm text-black" data-toggle="tooltip" data-original-title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success btn-sm text-black" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm text-black" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this employee?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                  
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection