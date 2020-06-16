<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\MaxTotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\TemporaryUploadMediaFileSizeRule;
use Spatie\MediaLibraryPro\Rules\TotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\UploadedMediaRule;

class StoreMultipleUploadsRequest extends FormRequest
{
    public function fieldName()
    {
        return 'media';
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['min:1', 'max:5', new MaxTotalUploadMediaSizeRule(12345)],
            'media.*' => [
                UploadedMediaRule::minSizeInKb(20),
            ],
            'media.*.name' => 'required',
        ];
    }
}
