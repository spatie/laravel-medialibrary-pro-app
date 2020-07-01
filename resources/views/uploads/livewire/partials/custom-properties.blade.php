These are the custom properties:

Extra field:
<input
    class="border"
    type="text"
    name="{{ $mediaItem->customPropertyFieldName('extra_field') }}"
    value="{{ $mediaItem->customPropertyFieldValue('extra_field') }}"
/>
@error($mediaItem->customPropertyErrorName('extra_field'))
{{ $errors->first($mediaItem->customPropertyErrorName('extra_field')) }}
@enderror
