<?php

namespace App\Http\Components\Livewire;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadSingleComponent extends Component
{
    use WithFileUploads;

    /** @var string */
    public $formElementName;

    /** @var string */
    public $rules;

    /** @var string */
    public $mediaUuid;

    /** @var string */
    public $previewUrl;

    /** @var string */
    public $uploadName;

    /** @var \Livewire\TemporaryUploadedFile|null */
    public $upload;

    /** @var string */
    public $path;


    public function mount(
        string $formElementName,
        string $rules = '',
        string $uploadName = '',
        string $previewUrl = '',
        string $mediaUuid = ''
    ) {
        ld('mount values', func_get_args());
        $this->formElementName = $formElementName;

        $this->rules = $rules;

        $this->uploadName = $uploadName;

        $this->previewUrl = $previewUrl;

        $this->mediaUuid = $mediaUuid;
    }

    public function updatedUpload()
    {
        $this->validate([
            'upload' => $this->rules
        ]);

        $this->path = $this->upload->path();

        $temporaryUploadModelClass = config('media-library.temporary_upload_model');

        $uploadedFile = new UploadedFile($this->upload->path(), $this->upload->getClientOriginalName());

        $temporaryUpload = $temporaryUploadModelClass::createForFile(
            $uploadedFile,
            session()->getId(),
            (string)Str::uuid(),
            $this->upload->getClientOriginalName()
        );

        $media = $temporaryUpload->getFirstMedia();

        $this->mediaUuid = $media->uuid;

        $this->uploadName = $media->name;

        $this->previewUrl = $temporaryUpload->getFirstMediaUrl('default', 'preview');
    }

    public function render()
    {
        return view('uploads.livewire.components.upload-single');
    }
}
