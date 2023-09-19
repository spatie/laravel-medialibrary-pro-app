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
                    collection="images"
                    :model="$formSubmission"
                    wire:model="images"
                    rules="mimes:png,jpeg"
                />
            </x-field>

            <x-field label="Downloads">
                <livewire:media-library
                    collection="downloads"
                    :model="$formSubmission"
                    wire:model="downloads"
                />
            </x-field>

            <x-button dusk="submit">Submit</x-button>
        </x-grid>
    </form>
</div>
