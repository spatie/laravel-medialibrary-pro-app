<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Dto\CollectionResponse;
use Spatie\MediaLibraryPro\Rules\MaxTotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\TemporaryUploadMediaFileSizeRule;
use Spatie\MediaLibraryPro\Rules\TotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\UploadedMedia;
use Spatie\MediaLibraryPro\Rules\UploadedMediaRule;

class StoreMultipleUploadsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['required', 'min:1', 'max:5', UploadedMedia::maxTotalSizeInKb(12345)],
            'media.*' => [
                UploadedMedia::minSizeInKb(20),
            ],
        ];
    }
}
