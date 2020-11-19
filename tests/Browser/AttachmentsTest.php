<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AttachmentsTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        FormSubmission::truncate();
    }

    /**
     * @test
     *
     * @dataProvider routeNames
     */
    public function it_can_submit_multiple_files(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->pause(500)
                ->attach('@main-uploader', $this->getStubPath('purple.png'))
                ->pause(500)
                ->waitUntilMissing('.media-library-progress-wrap.media-library-progress-wrap-loading')
                ->waitForText('Remove')
                ->press('@submit')
                ->waitForText('Your form has been submitted');

            $this->assertEquals('space.png', FormSubmission::first()->getFirstMedia('images')->file_name);
        });
    }

    public function routeNames(): array
    {
        return [
            ['vue.attachments'],
            ['react.attachments'],
            ['vue.async-attachments'],
            ['react.async-attachments'],
            ['blade.attachments'],
            ['livewire.attachments'],
        ];
    }
}
