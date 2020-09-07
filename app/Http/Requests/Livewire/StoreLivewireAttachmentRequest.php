<?php

namespace App\Http\Requests\Livewire;

use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;
use Illuminate\Foundation\Http\FormRequest;

class StoreLivewireAttachmentRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', $this->validateSingleMedia()
                ->minSizeInKb(300)
                ->maxItemSizeInKb(2000)
            ]
        ];
    }
}
