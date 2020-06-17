<?php

namespace App\Http\Components;

use Illuminate\View\Component;
use Spatie\MediaLibraryPro\Models\TemporaryUpload;

class MediaLibraryUploadComponent extends Component
{
    public string $name;

    public string $rules;

    public array $oldValues;

    public string $uuid;

    public function __construct(string $name, string $rules = '', string $uuid = '')
    {
        $this->name = $name;

        $this->rules = $rules;

        $this->uuid = $uuid;

        $this->oldValues = $this->oldValues();
    }

    public function render()
    {
        return view('uploads.components.media-library-upload');
    }

    protected function oldValues(): array
    {
        $allOldValues = old($this->name);

        if (is_null($allOldValues)) {
            return [];
        }

        $uuid = empty($this->uuid) ? array_key_first($allOldValues) : $this->uuid;

        $mediaProperties = $allOldValues[$uuid] ?? [];

        $temporaryUpload = TemporaryUpload::findByMediaUuidInCurrentSession($uuid);

        if (!$temporaryUpload) {
            return [];
        }

        if ($previewUrl = $temporaryUpload->getFirstMediaUrl('default', 'preview')) {
            $mediaProperties['preview'] = $previewUrl;
        }

        return $mediaProperties;
    }
}
