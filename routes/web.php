<?php

use App\Http\Controllers\Livewire\LivewireVaporController;
use App\Http\Controllers\LivewireExperimentalController;
use App\Http\Controllers\Livewire\LivewireMultipleAttachmentsController;
use App\Http\Controllers\Livewire\LivewireCollectionController;
use App\Http\Controllers\Livewire\LivewireSingleAttachmentController;
use App\Http\Controllers\React\ReactUploadMultipleController;
use App\Http\Controllers\React\ReactUploadSingleController;
use App\Http\Controllers\Vue\VueAsyncCollectionController;
use App\Http\Controllers\Vue\VueCollectionController;
use App\Http\Controllers\Vue\VueMultipleAttachmentsController;
use App\Http\Controllers\Vue\VueSingleAttachmentController;
use App\Http\Controllers\Vue\VueSingleAsyncAttachmentController;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibraryPro\Http\Controllers\CreateTemporaryUploadFromDirectS3UploadController;
use Spatie\MediaLibraryPro\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('vue')->group(function() {
    Route::get('attachment', [VueSingleAttachmentController::class, 'create'])->name('vue.single-attachment');
    Route::post('attachment', [VueSingleAttachmentController::class, 'store']);

    Route::get('single-async-attachment', [VueSingleAsyncAttachmentController::class, 'create'])->name('vue.single-async-attachment');
    Route::post('single-async-attachment', [VueSingleAsyncAttachmentController::class, 'store']);

    Route::get('multiple-attachments', [VueMultipleAttachmentsController::class, 'create'])->name('vue.multiple-attachments');
    Route::post('multiple-attachments', [VueMultipleAttachmentsController::class, 'store']);

    Route::get('collection', [VueCollectionController::class, 'create'])->name('vue.collection');
    Route::post('collection', [VueCollectionController::class, 'store']);

    Route::get('async-collection', [VueAsyncCollectionController::class, 'create'])->name('vue.async-collection');
    Route::post('async-collection', [VueAsyncCollectionController::class, 'store']);
});

Route::prefix('react')->group(function() {
    Route::get('attachment', [ReactUploadSingleController::class, 'create'])->name('react.attachment');
    Route::post('attachment', [ReactUploadSingleController::class, 'store']);

    Route::get('collection', [ReactUploadMultipleController::class, 'create'])->name('react.collection');
    Route::post('collection', [ReactUploadMultipleController::class, 'store']);
});

Route::view('vapor-js', 'vapor.vaporjs')->name('vapor');

Route::prefix('livewire')->group(function() {
    Route::get('single', [LivewireSingleAttachmentController::class, 'create'])->name('livewire.single-attachment');
    Route::post('single', [LivewireSingleAttachmentController::class, 'store']);

    Route::get('multiple', [LivewireMultipleAttachmentsController::class, 'create'])->name('livewire.multiple-attachments');
    Route::post('multiple', [LivewireMultipleAttachmentsController::class, 'store']);

    Route::get('collection', [LivewireCollectionController::class, 'create'])->name('livewire.collection');
    Route::post('collection', [LivewireCollectionController::class, 'store']);

    Route::get('vapor', [LivewireVaporController::class, 'create'])->name('livewire.vapor');
    Route::post('vapor', [LivewireVaporController::class, 'store']);
});


// medialibrary pro
Route::post('temp-upload', UploadController::class);
Route::post('post-s3-upload', CreateTemporaryUploadFromDirectS3UploadController::class);
