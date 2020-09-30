<?php

namespace App\Http\Controllers\React;

use App\Http\Requests\React\StoreReactCollectionRequest;
use App\Models\FormSubmission;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ReactCollectionController
{
    public function create()
    {
        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::firstOrCreate(['name' => 'test']);

        $initialValues = [
            'images' => $this->getMedia($formSubmission, 'images'),
            'downloads' => $this->getMedia($formSubmission, 'downloads'),
        ];

        return view('uploads.react.collection', compact('initialValues'));
    }

    public function store(StoreReactCollectionRequest $request)
    {
        $fieldName = $request->media;

        /** @var \App\Models\FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create([
            'name' => $request->name ?? 'nothing',
        ])
            ->addMultipleMediaFromTemporaryUploads($request->$fieldName ?? [])
            ->each->toMediaCollection('images');

        flash()->success('Your form has been submitted');

        return back();
    }

    protected function getMedia(Model $model, string $collectionName): array
    {
        return old($collectionName) ? old($collectionName) : $model
            ->getMedia($collectionName)
            ->map(function (Media $media) {
                return [
                    'name' => $media->name,
                    'file_name' => $media->file_name,
                    'uuid' => $media->uuid,
                    'preview_url' => $media->hasGeneratedConversion('preview') ? $media->getUrl('preview') : '',
                    'order' => $media->order_column,
                    'custom_properties' => $media->custom_properties,
                    'extension' => $media->extension,
                    'size' => $media->size,
                ];
            })
            ->keyBy('uuid')
            ->toArray();
    }
}
