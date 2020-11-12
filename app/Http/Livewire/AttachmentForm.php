<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;

class AttachmentForm extends Component
{
    public $name;

    public $message = '';

    public $file;

    protected $listeners = ['mediaChanged'];

    public function mediaChanged($media)
    {
        $this->file = $media;
    }

    public function submit()
    {
        timber('here');
        timber($this->file);


        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $this->name,
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($this->file)
            ->toMediaCollection('images');

        $this->message = 'Thank you for your submission';

        $this->name = '';
    }

    public function render()
    {
        return view('livewire.attachment-form');
    }
}
