<livewire:upload-single
    :form-element-name="$name"
    :rules="$rules"
    :upload-name="$oldValues[0]['name'] ?? ''"
    :preview-url="$oldValues[0]['preview'] ?? ''"
    :media-uuid="$oldValues[0]['uuid'] ?? ''"
/>
