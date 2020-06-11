<?php
namespace App\Http\Requests;

use App\Rules\TestRule;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\TemporaryUploadMediaFileSizeRule;
use Spatie\MediaLibraryPro\Rules\TotalUploadSizeRule;
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
           // 'name' => 'required',
          //  'media' => ['min:1', 'max:5', new TotalUploadSizeRule(12345)],
          //  'media.*' => [UploadedMediaRule::maxSizeInKb(1024), UploadedMediaRule::minSizeInKb(24)],
        ];
    }
}
