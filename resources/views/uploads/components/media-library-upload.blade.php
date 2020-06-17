<livewire:upload-single
    :form-element-name="$name"
    :rules="$rules"
    :upload-name="$oldValues['name'] ?? ''"
    :preview-url="$oldValues['preview'] ?? ''"
    :media-uuid="$oldValues['uuid'] ?? ''"
/>
