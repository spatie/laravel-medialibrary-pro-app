These are the custom properties:

Extra field:
<input
    class="border"
    type="text"
    {{ $mediaItem->customPropertyInputAttributes('extra_field') }}
/>

@error($mediaItem->customPropertyErrorName('extra_field'))
{{ $errors->first($mediaItem->customPropertyErrorName('extra_field')) }}
@enderror
