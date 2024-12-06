<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.register'); // Directly return the register view
});


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();  // Logout the user
    return redirect()->route('login.show');  // Redirect to login page
})->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');



Route::get('departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');


Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

