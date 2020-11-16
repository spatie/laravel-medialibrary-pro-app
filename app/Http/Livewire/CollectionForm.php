<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;

class CollectionForm extends Component
{
    public $message = '';

    public FormSubmission $formSubmission;

    public $images = [];

    public $downloads = [];

    protected $listeners = [
        'imagesChanged',
        'downloadsChanged',
    ];

    public function mount()
    {
        $this->formSubmission = FormSubmission::firstOrCreate(['id' => 1]);
    }

    public function imagesChanged($media)
    {
        $this->media = $media;
    }

    public function downloadsChanged($media)
    {
        $this->media = $media;
    }

    public function submit()
    {
        $this->validate([
            'formSubmission.name' => 'required',
            'images' => 'required',
            'downloads' => 'required',
        ]);

        $this->formSubmission->save();

        $this->formSubmission
            ->syncFromMediaLibraryRequest($this->images)
            ->toMediaCollection('images');

        $this->formSubmission
            ->syncFromMediaLibraryRequest($this->downloads)
            ->toMediaCollection('images');

        $this->message = 'Thank you for your submission';
    }

    public function render()
    {
        $this->initializeMediaLibraryComponents('images', 'downloads');

        return view('livewire.collection-form');
    }

    public function initializeMediaLibraryComponents(...$mediaFieldNames)
    {
        foreach ($mediaFieldNames as $mediaFieldName) {
            $errorBag = $this->getErrorBag();

            if ($errorBag->has($mediaFieldName)) {
                $this->emit('mediaValidationError', $errorBag->first($mediaFieldName));
            }
        }
    }
}
