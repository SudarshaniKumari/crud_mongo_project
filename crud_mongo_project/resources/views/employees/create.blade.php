@extends('layouts/user')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="text-center">
                    <h3>Add Employee</h3>
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

                <br>

                <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="emp_id" name="emp_id" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Last Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="emp_l_name" name="emp_l_name" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Hire Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="emp_f_name" name="emp_f_name" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Job Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="job_name" name="job_name" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <!-- Third Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee Phone Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="dep_no">Department<span class="text-danger">*</span></label>
                                <select class="form-control" id="department" name="department" required>
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->_id }}">{{ $department->dep_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="form-group mb-0">
                        <div class="checkbox checkbox-secondary d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">Create</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-danger">Close</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection