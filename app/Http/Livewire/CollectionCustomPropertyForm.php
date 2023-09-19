<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;
use Spatie\MediaLibraryPro\Livewire\Concerns\WithMedia;

class CollectionCustomPropertyForm extends Component
{
    use WithMedia;

    public $message = '';

    public FormSubmission $formSubmission;

    public ?string $name;

    public $images = [];

    public function mount()
    {
        $this->formSubmission = FormSubmission::firstOrCreate(['id' => 1]);
        $this->name = $this->formSubmission->name;
    }

    public function clearImages(): void
    {
        $this->images = [];
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'images.*.name' => 'required',
            'images.*.custom_properties.extra_field' => 'required',
        ], ['required' => 'This field is required']);

        $this->formSubmission->name = $this->name;
        $this->formSubmission->save();

        $this
            ->formSubmission
            ->syncFromMediaLibraryRequest($this->images)
            ->withCustomProperties('extra_field')
            ->toMediaCollection('images');

        $this->message = 'Your form has been submitted';
    }

    public function render()
    {
        return view('livewire.collection-custom-property-form');
    }
}
