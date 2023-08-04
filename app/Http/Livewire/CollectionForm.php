<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;
use Spatie\MediaLibraryPro\Livewire\Concerns\WithMedia;

class CollectionForm extends Component
{
    use WithMedia;

    public $message = '';

    public FormSubmission $formSubmission;

    public ?string $name;

    public $images = [];

    public $downloads = [];

    public function mount()
    {
        $this->formSubmission = FormSubmission::firstOrCreate(['id' => 1]);
        $this->name = $this->formSubmission->name;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'images.*.name' => 'required',
        ], ['required' => 'This field is required']);

        $this->formSubmission->name = $this->name;
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
