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
    public $uuid;

    /** @var string */
    public $preview;

    /** @var string */
    public $uploadName;

    /** @var \Livewire\TemporaryUploadedFile|null */
    public $upload;

    /** @var string */
    public $path;


    public function mount(string $name, string $rules, array $oldValue)
    {
        $this->formElementName = $name;

        $this->rules = $rules;

        if (!count($oldValue)) {
            return;
        }

        $this->uploadName = $oldValue['name'];

        $this->preview = $oldValue['preview'];

        $this->uuid = $oldValue['uuid'];
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

        $this->uuid = $media->uuid;

        $this->uploadName = $media->name;

        $this->preview = $temporaryUpload->getFirstMediaUrl('default', 'preview');
    }

    public function render()
    {
        return view('uploads.livewire.components.upload-single');
    }
}
