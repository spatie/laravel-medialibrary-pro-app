<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class CollectionForm extends Component
{
    use WithMedia;

    public $message = '';

    public FormSubmission $formSubmission;

    public $mediaComponentNames = ['images', 'downloads'];

    public $images = [];

    public $downloads = [];

    protected $rules = [
        'formSubmission.name' => 'required',
    ];

    public function mount()
    {
        $this->formSubmission = FormSubmission::firstOrCreate(['id' => 1]);
    }

    public function submit()
    {
        timber()->clearScreen();
        timber('submitting', $this->images)->color('green');
        $this->validate([
            'formSubmission.name' => 'required',
            //'images' => 'required',
          //  'downloads' => 'required',
        ]);

        $this->formSubmission->save();

        $this->formSubmission
            ->syncFromMediaLibraryRequest($this->images)
            ->toMediaCollection('images');

        /*
        $this->formSubmission
            ->syncFromMediaLibraryRequest($this->downloads)
            ->toMediaCollection('downloads');
        */

        $this->message = 'Saved!';
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
