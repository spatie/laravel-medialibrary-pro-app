<div>
    @include('livewire.partials.flash')

    <form method="POST" wire:submit.prevent="submit">
        <x-grid>
            @csrf

            <x-field label="name">
                <x-input name="name" autocomplete="off" id="name" wire:model="name"
                         placeholder="Your first name"/>
            </x-field>

            <x-field label="Images">
                <livewire:media-library
                    :model="$formSubmission"
                    collection="images"
                    wire:model="images"
                    fields-view="livewire.partials.custom-properties"
                />
            </x-field>

            <x-button dusk="submit">Submit</x-button>

            <x-button wire:click.prevent="clearImages">Clear</x-button>
        </x-grid>
    </form>
</div>
