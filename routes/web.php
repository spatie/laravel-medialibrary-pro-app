<?php

use App\Http\Controllers\Livewire\LivewireVaporController;
use App\Http\Controllers\LivewireExperimentalController;
use App\Http\Controllers\Livewire\LivewireAttachmentsController;
use App\Http\Controllers\Livewire\LivewireCollectionController;
use App\Http\Controllers\Livewire\LivewireSingleAttachmentController;
use App\Http\Controllers\React\ReactAsyncCollectionController;
use App\Http\Controllers\React\ReactCollectionController;
use App\Http\Controllers\React\ReactAttachmentsController;
use App\Http\Controllers\React\ReactSingleAsyncAttachmentController;
use App\Http\Controllers\React\ReactSingleAttachmentController;
use App\Http\Controllers\Vue\VueAsyncCollectionController;
use App\Http\Controllers\Vue\VueCollectionController;
use App\Http\Controllers\Vue\VueAttachmentsController;
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

    Route::get('attachments', [VueAttachmentsController::class, 'create'])->name('vue.attachments');
    Route::post('attachments', [VueAttachmentsController::class, 'store']);

    Route::get('collection', [VueCollectionController::class, 'create'])->name('vue.collection');
    Route::post('collection', [VueCollectionController::class, 'store']);

    Route::get('async-collection', [VueAsyncCollectionController::class, 'create'])->name('vue.async-collection');
    Route::post('async-collection', [VueAsyncCollectionController::class, 'store']);
});

Route::prefix('react')->group(function() {
    Route::get('single-attachment', [ReactSingleAttachmentController::class, 'create'])->name('react.single-attachment');

    Route::post('single-attachment', [ReactSingleAttachmentController::class, 'store']);

    Route::get('single-async-attachment', [ReactSingleAsyncAttachmentController::class, 'create'])->name('react.single-async-attachment');
    Route::post('single-async-attachment', [ReactSingleAttachmentController::class, 'store']);

    Route::get('attachments', [ReactAttachmentsController::class, 'create'])->name('react.attachments');
    Route::post('attachments', [ReactAttachmentsController::class, 'store']);

    Route::get('collection', [ReactCollectionController::class, 'create'])->name('react.collection');
    Route::post('collection', [ReactCollectionController::class, 'store']);

    Route::get('async-collection', [ReactAsyncCollectionController::class, 'create'])->name('react.async-collection');
    Route::post('async-collection', [ReactAsyncCollectionController::class, 'store']);
});

Route::view('vapor-js', 'vapor.vaporjs')->name('vapor');

Route::prefix('livewire')->group(function() {
    Route::get('single', [LivewireSingleAttachmentController::class, 'create'])->name('livewire.single-attachment');
    Route::post('single', [LivewireSingleAttachmentController::class, 'store']);

    Route::get('multiple', [LivewireAttachmentsController::class, 'create'])->name('livewire.attachments');
    Route::post('multiple', [LivewireAttachmentsController::class, 'store']);

    Route::get('collection', [LivewireCollectionController::class, 'create'])->name('livewire.collection');
    Route::post('collection', [LivewireCollectionController::class, 'store']);

    Route::get('vapor', [LivewireVaporController::class, 'create'])->name('livewire.vapor');
    Route::post('vapor', [LivewireVaporController::class, 'store']);
});


// medialibrary pro
Route::post('temp-upload', UploadController::class);
Route::post('post-s3-upload', CreateTemporaryUploadFromDirectS3UploadController::class);
