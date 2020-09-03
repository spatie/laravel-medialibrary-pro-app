<?php

namespace App\Http\Requests\Livewire;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\UploadedMedia;

class StoreLivewireCollectionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'images' => ['required', 'min:1', 'max:5', UploadedMedia::maxTotalSizeInKb(12345)],
            'images.*' => [
                UploadedMedia::minSizeInKb(20),
            ],
        ];
    }
}
