<?php

namespace App\Http\Livewire;

use App\Models\FormSubmission;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class CollectionCustomPropertyForm extends Component
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
            'formSubmission.name' => 'required',
        ]);

        $this->formSubmission->save();

        timber($this->images, 'submitting')->green();
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
