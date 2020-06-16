<?php

namespace App\Http\Components;

use Illuminate\View\Component;
use Spatie\MediaLibraryPro\Models\TemporaryUpload;

class MediaLibraryUploadComponent extends Component
{
    public string $name;

    public string $rules;

    public array $oldValues;

    public function __construct(string $name, string $rules = '')
    {
        $this->name = $name;

        $this->rules = $rules;

        $this->oldValues = $this->oldValues();
    }

    public function render()
    {
        return view('uploads.components.media-library-upload');
    }

    protected function oldValues(): array
    {
        return collect(old($this->name))
            ->map(function (array $mediaProperties) {
                $temporaryUpload = TemporaryUpload::findByMediaUuidInCurrentSession($mediaProperties['uuid']);

                if ($previewUrl = $temporaryUpload->getFirstMediaUrl('default', 'preview')) {
                    $mediaProperties['preview'] = $previewUrl;
                }

                return $mediaProperties;
            })
            ->toArray();
    }
}
