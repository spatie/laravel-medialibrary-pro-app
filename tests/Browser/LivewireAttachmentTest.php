<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LivewireAttachmentTest extends DuskTestCase
{

    public function it_can_handle_a_successful_form_request()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/single')
                ->attach('[data-testing-role="uploader"', $this->getStubPath('space.png'))
                ->press('SUBMIT');
        });
    }

    protected function getStubPath(string $fileName)
    {
        return __DIR__ . "/stubs/{$fileName}";
    }
}
