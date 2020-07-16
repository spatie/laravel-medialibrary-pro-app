<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Tests\DuskTestCase;

class LivewireAttachmentTest extends DuskTestCase
{
    /** @test */
    public function it_can_handle_a_successful_form_request()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/single')
                ->type('name', 'My name')
                ->attach('[data-testing-role="uploader"', $this->getStubPath('space.png'))
                ->waitUntilMissingText('Uploading')
                ->press('[data-testing-role="submit"]')
                ->assertSee('Your form has been submitted');

            $this->assertCount(1, FormSubmission::get());
            $this->assertEquals('space.png', FormSubmission::first()->getFirstMedia('images')->file_name);
        });
    }

    /** @test */
    public function it_will_not_lose_the_uploaded_file_when_submitting_a_form_results_in_validation_errors()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/single')
                ->attach('[data-testing-role="uploader"', $this->getStubPath('space.png'))
                ->waitUntilMissingText('Uploading')
                ->press('[data-testing-role="submit"]');

            $this->assertCount(0, FormSubmission::all());

            $browser
                ->assertSee('Please correct the errors in the form')
                ->assertVisible('[data-testing-role="thumb"]')
                ->type('name', 'My name failing test')
                ->press('[data-testing-role="submit"]')
                ->assertSee('Your form has been submitted');

            $this->assertCount(1, FormSubmission::all());
            $this->assertEquals('space.png', FormSubmission::first()->getFirstMedia('images')->file_name);
        });
    }

    protected function getStubPath(string $fileName)
    {
        return __DIR__ . "/stubs/{$fileName}";
    }
}
