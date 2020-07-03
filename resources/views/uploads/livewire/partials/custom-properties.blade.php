These are the custom properties:

Extra field:
<input
    class="border"
    type="text"
    {{ $mediaItem->customPropertyAttributes('extra_field') }}
/>

@error($mediaItem->customPropertyAttributeName('extra_field'))
{{ $errors->first($mediaItem->customPropertyAttributeValue('extra_field')) }}
@enderror
