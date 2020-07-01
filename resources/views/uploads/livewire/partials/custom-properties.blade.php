These are the custom properties:

Extra field:
<input
    class="border"
    type="text"
    name="{{ $name }}[{{ $mediaItem['uuid'] }}][custom_properties][extra_field]"
    value="{{ $mediaItem['custom_properties']['extra_field'] ?? '' }}"
/>
