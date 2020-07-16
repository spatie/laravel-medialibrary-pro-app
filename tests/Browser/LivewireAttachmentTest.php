<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LivewireAttachmentTest extends DuskTestCase
{
    use RefreshDatabase;

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
        });

        $this->assertCount(1, FormSubmission::get());
        dump(FormSubmission::first()->media);
        $this->assertEquals('space.png', FormSubmission::first()->getFirstMedia('images')->file_name);

    }

    protected function getStubPath(string $fileName)
    {
        return __DIR__ . "/stubs/{$fileName}";
    }
}
