<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentController::class, 'index']);
Route::get('/lingkaran', [StudentController::class, 'lingkaran']);

Route::get('/hello', function () {
    return 'Hello World';
});