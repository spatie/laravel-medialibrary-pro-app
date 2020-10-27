@include('media-library::livewire.partials.collection.fields')

<div class="media-library-field">
    <label class="media-library-label">Extra field</label>
    <input
        dusk="media-library-extra-field"
        class="media-library-input"
        type="text"
        {{ $mediaItem->customPropertyAttributes('extra_field')  }}
    />

    @error($mediaItem->customPropertyErrorName('extra_field'))
        <span class="media-library-text-error">
               {{ $message }}
        </span>
    @enderror
</div>
