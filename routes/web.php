<?php

use App\Http\Controllers\FormSubmissionController;
use Spatie\MedialibraryPro\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('single-upload', [FormSubmissionController::class, 'showForm']);

Route::post('temp-upload', UploadController::class);

Route::post('single-upload', [FormSubmissionController::class, 'store']);
