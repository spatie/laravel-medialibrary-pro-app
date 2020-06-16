<div>
    <input type="file" wire:model="upload">

    @error('upload') <span class="error">{{ $message }}</span> @enderror

    <div wire:loading wire:target="upload">Uploading...</div>

    <input type="hidden" name="{{ $this->formElementName }}[0][uuid]" value="{{ $this->mediaUuid }}"/>
    <input type="hidden" name="{{ $this->formElementName }}[0][name]" value="{{ $this->uploadName }}"/>

    @if($this->previewUrl)
        <img src="{{ $this->previewUrl }}" alt="{{ $this->uploadName }}">
    @endif
</div>
