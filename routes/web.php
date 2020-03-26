<?php

use App\Http\Controllers\ReactUploadMultipleController;
use App\Http\Controllers\ReactUploadSingleController;
use App\Http\Controllers\VueUploadMultipleController;
use App\Http\Controllers\VueUploadSingleController;
use Spatie\MediaLibraryPro\Http\Controllers\CreateTemporaryUploadFromDirectS3UploadController;
use Spatie\MediaLibraryPro\Http\Controllers\TemporaryUploadController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('vue')->group(function() {
    Route::get('single', [VueUploadSingleController::class, 'create'])->name('vue.single');
    Route::post('single', [VueUploadSingleController::class, 'store']);

    Route::get('multiple', [VueUploadMultipleController::class, 'create'])->name('vue.multiple');
    Route::post('multiple', [VueUploadMultipleController::class, 'store']);
});

Route::prefix('react')->group(function() {
    Route::get('single', [ReactUploadSingleController::class, 'create'])->name('react.single');
    Route::post('single', [ReactUploadSingleController::class, 'store']);

    Route::get('multiple', [ReactUploadMultipleController::class, 'create'])->name('react.multiple');
    Route::post('multiple', [ReactUploadMultipleController::class, 'store']);
});

Route::view('vapor-js', 'vapor.vaporjs')->name('vapor');

// medialibrary pro
Route::post('temp-upload', TemporaryUploadController::class);
Route::post('post-s3-upload', CreateTemporaryUploadFromDirectS3UploadController::class);
