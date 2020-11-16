<div>
    @if ($message !== '')
        <div class="rounded-sm mb-8 px-4 py-2 bg-green-100 text-green-500">
            Your form has been submitted
        </div>
    @endif

    <br/>
    <form method="POST" wire:submit.prevent="submit">
        <x-grid>
            @csrf

            <x-field label="name">
                <x-input name="name" autocomplete="off" id="name" wire:model="formSubmission.name"
                         placeholder="Your first name"/>
            </x-field>
            <div id="images">
                <x-field label="Images">
                    <x-media-library-collection name="images" :model="$formSubmission"/>
                </x-field>
            </div>
            <div id="downloads">
                <x-field label="Downloads">
                    <x-media-library-collection name="downloads" :model="$formSubmission"/>
                </x-field>
            </div>

            <x-button dusk="submit">Submit</x-button>
        </x-grid>
    </form>
</div>
