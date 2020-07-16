<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Tests\DuskTestCase;

class LivewireCollectionTest extends DuskTestCase
{
    /** @test */
    public function it_can_upload_an_display_a_single_file()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection')
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))

                ->waitUntilMissingText('Uploading')
                ->press('[data-testing-role="submit"]')
                ->assertSee('Your form has been submitted')
                ->assertVisible('[data-testing-role="thumb"]');

            $this->assertCount(1, Media::all());
        });

    }
}
