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
        $this->validate([
            'images.*.name' => 'required',
        ], ['required' => 'This field is required']);

        $this->formSubmission->save();

        $this
            ->formSubmission
            ->syncFromMediaLibraryRequest($this->images)
            ->toMediaCollection('images');

        $this
            ->formSubmission
            ->syncFromMediaLibraryRequest($this->downloads)
            ->toMediaCollection('downloads');

        $this->message = 'Your form has been submitted';
    }

    public function render()
    {
        return view('livewire.collection-form');
    }
}
