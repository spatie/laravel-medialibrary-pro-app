<?php

namespace App\Http\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Spatie\MediaLibrary\HasMedia;

class MediaLibraryCollectionComponent extends Component
{
    public string $name;

    public HasMedia $model;

    public string $collectionName;

    public Collection $media;

    public string $rules;

    public function __construct(string $name, HasMedia $model, string $collectionName, string $rules = '')
    {
        $this->name = $name;

        $this->model = $model;

        $this->collectionName = $collectionName;

        $this->media = $this->model->getMedia($this->collectionName);

        $this->rules = $rules;
    }

    public function render()
    {
        return view('uploads.components.media-library-collection');
    }
}
