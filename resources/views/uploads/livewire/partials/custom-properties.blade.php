@include('media-library::livewire.partials.collection.fields')

<div class="medialibrary-field">
    <label class="medialibrary-label">Extra field</label>
    <input
        class="medialibrary-input"
        type="text"
        {{ $mediaItem->customPropertyAttributes('extra_field')  }}
    />

    @error($mediaItem->customPropertyErrorName('extra_field'))
        <span class="medialibrary-text-error">
               {{ $message }}
        </span>
    @enderror
</div>
