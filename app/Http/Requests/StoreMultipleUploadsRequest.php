<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\MediaCollections\Contracts\MediaLibraryRequest;
use Spatie\MediaLibraryPro\Dto\CollectionResponse;
use Spatie\MediaLibraryPro\Dto\MediaLibraryRequestItem;
use Spatie\MediaLibraryPro\Rules\MaxTotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\TemporaryUploadMediaFileSizeRule;
use Spatie\MediaLibraryPro\Rules\TotalUploadMediaSizeRule;
use Spatie\MediaLibraryPro\Rules\UploadedMedia;
use Spatie\MediaLibraryPro\Rules\UploadedMediaRule;

class StoreMultipleUploadsRequest extends FormRequest implements MediaLibraryRequest
{
    public function fieldName()
    {
        return 'media';
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'media' => ['min:1', 'max:5', UploadedMedia::maxTotalSizeInKb(12345)],
            'media.*' => [
                UploadedMedia::minSizeInKb(20),
            ],
            'media.*.name' => 'required',
        ];
    }

    public function mediaLibraryRequestItems(string $key): Collection
    {
        return collect($this->get($key, []))
            ->map(fn(array $properties) => MediaLibraryRequestItem::fromArray($properties));
    }
}
