<?php

use App\Http\Controllers\Livewire\LivewireVaporController;
use App\Http\Controllers\Livewire\LivewireAttachmentsController;
use App\Http\Controllers\Livewire\LivewireCollectionController;
use App\Http\Controllers\Livewire\LivewireAttachmentController;
use App\Http\Controllers\Livewire\LivewireCollectionCustomPropertyController;
use App\Http\Controllers\React\ReactCollectionController;
use App\Http\Controllers\React\ReactAttachmentsController;
use App\Http\Controllers\React\ReactAsyncAttachmentsController;
use App\Http\Controllers\React\ReactAttachmentController;
use App\Http\Controllers\React\ReactVaporController;
use App\Http\Controllers\React\ReactCollectionCustomPropertyController;
use App\Http\Controllers\Vue\VueCollectionController;
use App\Http\Controllers\Vue\VueAttachmentsController;
use App\Http\Controllers\Vue\VueAttachmentController;
use App\Http\Controllers\Vue\VueAsyncAttachmentsController;
use App\Http\Controllers\Vue\VueVaporController;
use App\Http\Controllers\Vue\VueCollectionCustomPropertyController;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibraryPro\Http\Controllers\MediaLibraryS3UploadController;
use Spatie\MediaLibraryPro\Http\Controllers\MediaLibraryUploadController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('vue')->group(function () {
    Route::get('attachment', [VueAttachmentController::class, 'create'])->name('vue.attachment');
    Route::post('attachment', [VueAttachmentController::class, 'store']);

    Route::get('async-attachments', [VueAsyncAttachmentsController::class, 'create'])->name('vue.async-attachments');
    Route::post('async-attachments', [VueAsyncAttachmentsController::class, 'store']);

    Route::get('attachments', [VueAttachmentsController::class, 'create'])->name('vue.attachments');
    Route::post('attachments', [VueAttachmentsController::class, 'store']);

    Route::get('collection', [VueCollectionController::class, 'create'])->name('vue.collection');
    Route::post('collection', [VueCollectionController::class, 'store']);

    Route::get('collection-custom-property', [VueCollectionCustomPropertyController::class, 'create'])->name('vue.collection-custom-property');
    Route::post('collection-custom-property', [VueCollectionCustomPropertyController::class, 'store']);

    Route::get('vapor', [VueVaporController::class, 'create'])->name('vue.vapor');
});

Route::prefix('react')->group(function () {
    Route::get('attachment', [ReactAttachmentController::class, 'create'])->name('react.attachment');

    Route::post('attachment', [ReactAttachmentController::class, 'store']);

    Route::get('async-attachments', [ReactAsyncAttachmentsController::class, 'create'])->name('react.async-attachments');
    Route::post('async-attachments', [ReactAsyncAttachmentsController::class, 'store']);

    Route::get('attachments', [ReactAttachmentsController::class, 'create'])->name('react.attachments');
    Route::post('attachments', [ReactAttachmentsController::class, 'store']);

    Route::get('collection', [ReactCollectionController::class, 'create'])->name('react.collection');
    Route::post('collection', [ReactCollectionController::class, 'store']);

    Route::get('collection-custom-property', [ReactCollectionCustomPropertyController::class, 'create'])->name('react.collection-custom-property');
    Route::post('collection-custom-property', [ReactCollectionCustomPropertyController::class, 'store']);

    Route::get('vapor', [ReactVaporController::class, 'create'])->name('react.vapor');
});

Route::view('vapor-js', 'vapor.vaporjs')->name('vapor');

Route::prefix('livewire')->group(function () {
    Route::get('single', [LivewireAttachmentController::class, 'create'])->name('livewire.attachment');
    Route::post('single', [LivewireAttachmentController::class, 'store']);

    Route::get('multiple', [LivewireAttachmentsController::class, 'create'])->name('livewire.attachments');
    Route::post('multiple', [LivewireAttachmentsController::class, 'store']);

    Route::get('collection', [LivewireCollectionController::class, 'create'])->name('livewire.collection');
    Route::post('collection', [LivewireCollectionController::class, 'store']);

    Route::get('collection-custom-property', [LivewireCollectionCustomPropertyController::class, 'create'])->name('livewire.collection-custom-property');
    Route::post('collection-custom-property', [LivewireCollectionCustomPropertyController::class, 'store']);

    Route::get('vapor', [LivewireVaporController::class, 'create'])->name('livewire.vapor');
    Route::post('vapor', [LivewireVaporController::class, 'store']);
});


Route::temporaryUploads('temp-upload');
Route::mediaLibraryS3Uploads('post-s3-upload');
