<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf/{id}', [App\Http\Controllers\ExamController::class, 'pdf']);
Route::get('/key/pdf/{id}', [App\Http\Controllers\ExamController::class, 'keyPdf']);
