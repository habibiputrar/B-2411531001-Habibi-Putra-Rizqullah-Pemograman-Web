<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\StudentRelationController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentController::class, 'index']);
Route::get('/lingkaran', [StudentController::class, 'lingkaran']);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('products', ProductController::class);
Route::resource('costumers', CostumerController::class);

Route::get('students/latihan', [StudentRelationController::class, 'latihan'])->name('students.latihan');
Route::get('students/{id}/detail', [ScheduleController::class, 'studentDetail'])->name('students.detail');
Route::resource('schedules', ScheduleController::class);
Route::resource('students', StudentRelationController::class);

Route::get('/hello', function () {
    return 'Hello World';
});