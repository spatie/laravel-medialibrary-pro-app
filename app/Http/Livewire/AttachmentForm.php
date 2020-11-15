<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\LivewireMediaLibraryComponent;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class AttachmentForm extends Component
{
    use \Livewire\ComponentConcerns\ValidatesInput {
        validate as livewireValidate;
    }

    public $name;

    public $message = '';

    public $media = [];

    protected $listeners = ['mediaChanged'];

    public function mediaChanged($media)
    {
        $this->media = $media;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'media' => 'required',
        ]);

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $this->name,
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($this->media)
            ->toMediaCollection('images');

        $this->message = 'Thank you for your submission';

        $this->emit('clearMedia');

        $this->media = [];
        $this->name = '';
    }

    public function render()
    {
        $errorBag = $this->getErrorBag();

        if ($errorBag->has('media')) {
            $this->emit('mediaValidationError', $errorBag->first('media'));
        }

        return view('livewire.attachment-form');
    }
}
