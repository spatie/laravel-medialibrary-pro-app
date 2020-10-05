<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LivewireCollectionTest extends DuskTestCase
{
    /** @test */
    public function it_can_upload_and_display_a_single_file()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection')
                ->type('name', 'My name')
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->waitForText('Download', 10)
                ->press('[data-testing-role="submit"]')
                ->assertSee('Your form has been submitted')
                ->assertVisible('[data-testing-role="thumb"]');

            $this->assertCount(1, FormSubmission::first()->getMedia('images'));
        });
    }

    /** @test */
    public function uploading_a_file_and_removing_it_before_submitting_the_form_will_not_attach_media_to_the_model()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection')
                ->type('name', 'My name')
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->waitForText('Download')
                ->assertVisible('[data-testing-role="thumb"]')
                ->press('[data-testing-role="remove"]')
                ->waitUntilMissing('[data-testing-role="thumb"]')
                ->press('[data-testing-role="submit"]')
                ->assertSee('Your form has been submitted')
                ->assertMissing('[data-testing-role="thumb"]');

            $this->assertCount(0, FormSubmission::first()->getMedia('images'));
        });
    }

    /** @test */
    public function the_name_field_of_a_collection_item_is_required()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection')
                ->type('name', 'My name')
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->waitForText('Download')
                ->type('[data-testing-role="medialibrary-field-name"]', '')
                ->press('[data-testing-role="submit"]')
                ->assertSee('The name field is required');
        });
    }

    /** @test */
    public function it_will_not_display_the_main_uploader_when_the_maximum_amount_of_uploads_has_been_reached()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection')
                ->type('name', 'My name')
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->pause(200)
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->pause(200)
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->pause(200)
                ->assertMissing('[data-testing-role="main-uploader"]');
        });


    }

    /** @test */
    public function a_new_collection_item_can_be_replaced()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection')
                ->type('name', 'My name')
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->pause(500)
                ->attach('[data-testing-role="uploader"]', $this->getStubPath('logo.png'))
                ->pause(200)
                ->press('[data-testing-role="submit"]');

            $this->assertEquals('logo.png', FormSubmission::first()->getFirstMedia('images')->file_name);
        });

    }
}
