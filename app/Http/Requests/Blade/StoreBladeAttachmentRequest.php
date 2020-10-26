<?php

namespace App\Http\Requests\Blade;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class StoreBladeAttachmentRequest extends FormRequest
{
    use ValidatesMedia;

    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', $this->validateSingleMedia()
                ->maxItemSizeInKb(3000),
            ],
        ];
    }
}
