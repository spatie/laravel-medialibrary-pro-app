<?php

use App\Http\Controllers\FormSubmissionController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('upload', \Spatie\MedialibraryPro\Http\Controllers\UploadControlller::class);

Route::get('single-upload', [FormSubmissionController::class, 'showForm']);
Route::post('single-upload', [FormSubmissionController::class, 'store']);
