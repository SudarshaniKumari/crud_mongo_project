@extends('layouts.user')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="text-center">
                    <h3>Update Employee</h3>
                </div>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <!-- First Row -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="emp_id" name="emp_id" value="{{ $employee->emp_id }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="emp_f_name" name="emp_f_name" value="{{ $employee->emp_f_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="emp_l_name" name="emp_l_name" value="{{ $employee->emp_l_name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Second Row -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Job Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="job_name" name="job_name" value="{{ $employee->job_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Department<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="department" name="department" value="{{ $employee->department }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Phone Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $employee->phone_number }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Third Row -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Hire Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ $employee->hire_date }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-center">
                        <button type="submit" class="btn btn-primary me-2">Create</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-danger">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
