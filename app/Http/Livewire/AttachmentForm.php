<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class AttachmentForm extends Component
{
    use WithMedia;

    public $name;

    public $message = '';

    public $mediaComponentNames = ['media'];

    public $media;

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'media' => 'required|min:1',
        ]);

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $this->name,
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($this->media)
            ->toMediaCollection('images');

        $this->message = 'Your form has been submitted';

        $this->clearMedia();

        $this->name = '';
    }

    public function render()
    {
        return view('livewire.attachment-form');
    }
}
