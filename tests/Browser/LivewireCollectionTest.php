<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Laravel\Dusk\Browser;
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
                ->waitUntilMissing('medialibrary-progress')
                ->screenshot('before-submit')
                ->press('[data-testing-role="submit"]')
                ->assertSee('Your form has been submitted')
                ->assertVisible('[data-testing-role="thumb"]');

            //$this->assertCount(1, FormSubmission::getTestModel()->getMedia('images'));
        });
    }

    /** @test */
    public function uploading_a_file_and_removing_it_before_submitting_the_form_will_not_attach_media_to_the_model()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection')
                ->attach('[data-testing-role="main-uploader"]', $this->getStubPath('space.png'))
                ->waitUntilMissingText('Uploading')

                ->assertVisible('[data-testing-role="thumb"]')
                ->press('[data-testing-role="remove"]')

                ->assertMissing('[data-testing-role="thumb"]')
                ->assertSee('Your form has been submitted')
                ->assertMissing('[data-testing-role="thumb"]');

            $this->assertCount(1, FormSubmission::getTestModel()->getMedia('images'));
        });
    }
}
