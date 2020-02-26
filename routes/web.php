<?php

use App\Http\Controllers\FormSubmissionController;
use Spatie\MedialibraryPro\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('multi-vue', [FormSubmissionController::class, 'showVue']);
Route::get('multi-react', [FormSubmissionController::class, 'showReact']);

Route::post('temp-upload', UploadController::class);

Route::post('multi-upload', [FormSubmissionController::class, 'store']);
