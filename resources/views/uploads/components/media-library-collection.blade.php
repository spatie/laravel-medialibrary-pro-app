<ul>
    <li><livewire:upload-single :form-element-name="$name" /></li>

    @foreach($media as $mediaItem)
        <li>
            <livewire:upload-single
                :form-element-name="$name"
                :rules="$rules"
                :upload-name="$mediaItem->name"
                :preview-url="$mediaItem->getUrl('preview')"
                :media-uuid="$mediaItem->uuid"
            />
        </li>
    @endforeach
</ul>
