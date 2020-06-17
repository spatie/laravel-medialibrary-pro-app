<div>
    <input type="file" wire:model="upload">

    @error('upload') <span class="error">{{ $message }}</span> @enderror

    <div wire:loading wire:target="upload">Uploading...</div>

    @if($this->mediaUuid)
        <input type="hidden" name="{{ $this->formElementName }}[{{ $this->mediaUuid }}][uuid]" value="{{ $this->mediaUuid }}"/>
        <input type="hidden" name="{{ $this->formElementName }}[{{ $this->mediaUuid }}][name]" value="{{ $this->uploadName }}"/>
    @endif

    @if($this->previewUrl)
        <img src="{{ $this->previewUrl }}" alt="{{ $this->uploadName }}">
    @endif
</div>
