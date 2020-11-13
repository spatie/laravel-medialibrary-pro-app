<div>
    @if ($message !== '')
    <div class="rounded-sm mb-8 px-4 py-2 bg-green-100 text-green-500">
        Your form has been submitted
    </div>
    @endif

    <br />
    <form method="POST" wire:submit.prevent="submit">
        <x-grid>
            @csrf

            <x-field label="name">
                <x-input autocomplete="off" id="name" wire:model.debounce.500ms="name" placeholder="Your first name" />
            </x-field>
            {{-- @php(timber($file)) --}}
            <x-field label="file">
                {{-- <x-media-library-attachment name="media" rules="mimes:png,jpeg,pdf" :media="$file"/> --}}
                <livewire:media-library name="media" multiple="false" max-items="1"
                    item-view="media-library::livewire.partials.attachment.item"
                    list-view="media-library::livewire.partials.attachment.list"
                    properties-view="media-library::livewire.partials.attachment.properties" />
            </x-field>

            <x-button dusk="submit">Submit</x-button>
        </x-grid>
    </form>
</div>
