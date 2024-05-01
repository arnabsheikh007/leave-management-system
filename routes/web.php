<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//Route::get('/dashboard',[UserController::class,'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class,'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/manage-employee', [EmployeeController::class,'index'])->name('admin.manage-employee');
    Route::get('/admin/approve-employee/{id}', [EmployeeController::class,'approveEmployee'])->name('admin.approve-employee');
    Route::get('/admin/block-employee/{id}', [EmployeeController::class,'blockEmployee'])->name('admin.block-employee');
    Route::get('/admin/unblock-employee/{id}', [EmployeeController::class,'unblockEmployee'])->name('admin.unblock-employee');
});



require __DIR__.'/auth.php';
