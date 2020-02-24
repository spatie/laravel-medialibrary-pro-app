<?php

use App\Http\Controllers\FormSubmissionController;
use Spatie\MedialibraryPro\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('single-vue', [FormSubmissionController::class, 'showVue']);
Route::get('single-react', [FormSubmissionController::class, 'showReact']);

Route::post('temp-upload', UploadController::class);

Route::post('single-upload', [FormSubmissionController::class, 'store']);
