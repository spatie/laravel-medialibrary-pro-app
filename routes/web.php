<?php

use App\Http\Controllers\FormSubmissionController;
use Spatie\MediaLibraryPro\Http\Controllers\CreateTemporaryUploadFromDirectS3UploadController;
use Spatie\MediaLibraryPro\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('vue', [FormSubmissionController::class, 'showVue']);

Route::get('react', [FormSubmissionController::class, 'showReact']);

Route::post('temp-upload', UploadController::class);
Route::post('post-s3-upload', CreateTemporaryUploadFromDirectS3UploadController::class);

Route::post('multi-upload', [FormSubmissionController::class, 'store']);

Route::view('vapor-js', 'vapor.vaporjs');
