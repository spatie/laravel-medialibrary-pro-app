<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Dto\CollectionResponse;
use Spatie\MediaLibraryPro\Rules\MaxTotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\TemporaryUploadMediaFileSizeRule;
use Spatie\MediaLibraryPro\Rules\TotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\UploadedMediaRule;

class StoreSingleAttachmentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', 'min:1']
        ];
    }
}
