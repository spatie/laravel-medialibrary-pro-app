<?php

use App\Http\Controllers\Blade\BladeAttachmentController;
use App\Http\Controllers\Blade\BladeVaporController;
use App\Http\Controllers\Blade\BladeAttachmentsController;
use App\Http\Controllers\Blade\BladeCollectionController;
use App\Http\Controllers\Blade\TraditionalAttachmentController;
use App\Http\Controllers\Blade\BladeCollectionCustomPropertyController;
use App\Http\Controllers\React\ReactCollectionController;
use App\Http\Controllers\React\ReactAttachmentsController;
use App\Http\Controllers\React\ReactAsyncAttachmentsController;
use App\Http\Controllers\React\ReactAttachmentController;
use App\Http\Controllers\React\ReactVaporController;
use App\Http\Controllers\React\ReactCollectionCustomPropertyController;
use App\Http\Controllers\Traditional\TraditionalUploadController;
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


Route::get('traditional-upload', [TraditionalUploadController::class, 'create']);
Route::post('traditional-upload', [TraditionalUploadController::class, 'store']);

Route::prefix('blade')->group(function () {
    Route::get('single', [BladeAttachmentController::class, 'create'])->name('blade.attachment');
    Route::post('single', [BladeAttachmentController::class, 'store']);

    Route::get('multiple', [BladeAttachmentsController::class, 'create'])->name('blade.attachments');
    Route::post('multiple', [BladeAttachmentsController::class, 'store']);

    Route::get('collection', [BladeCollectionController::class, 'create'])->name('blade.collection');
    Route::post('collection', [BladeCollectionController::class, 'store']);

    Route::get('collection-custom-property', [BladeCollectionCustomPropertyController::class, 'create'])->name('blade.collection-custom-property');
    Route::post('collection-custom-property', [BladeCollectionCustomPropertyController::class, 'store']);
});

Route::view('vapor-js', 'vapor.vaporjs')->name('vapor');

Route::mediaLibrary();
