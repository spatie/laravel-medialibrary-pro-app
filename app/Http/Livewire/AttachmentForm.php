<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\LivewireMediaLibraryComponent;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class AttachmentForm extends Component
{
    use ValidatesMedia;

    public $name;

    public $message = '';

    public $file = [];

    protected $listeners = ['mediaChanged'];

    public function mediaChanged($media)
    {
        $this->file = $media;
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function submit()
    {
        $this->validate();

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $this->name,
        ]);

        $formSubmission
            ->addFromMediaLibraryRequest($this->file)
            ->toMediaCollection('images');

        $this->message = 'Thank you for your submission';

        $this->emit('clearMedia');

        $this->file = [];
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.attachment-form');
    }
}
