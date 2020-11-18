@include('media-library::livewire.partials.collection.fields')

<div class="media-library-field">
    <label class="media-library-label">Extra field</label>
    <input
        x-data
        dusk="media-library-extra-field"
        class="media-library-input"
        type="text"
        x-on:keyup.debounce="$wire.setCustomProperty('{{ $mediaItem->uuid }}', 'extra_field', document.getElementsByName('{{ $mediaItem->customPropertyAttributeName('extra_field') }}')[0].value)"
        {{ $mediaItem->customPropertyAttributes('extra_field')  }}
    />

    @error($mediaItem->customPropertyErrorName('extra_field'))
    <span class="media-library-text-error">
               {{ $message }}
        </span>
    @enderror
</div>
