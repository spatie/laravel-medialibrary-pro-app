<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class CollectionTest extends DuskTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        FormSubmission::truncate();
    }

    #[Test, DataProvider('routeNames')]
    public function an_existing_collection_can_be_displayed(string $routeName)
    {
        /** @var FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create(['name' => 'test']);

        $formSubmission
            ->addMedia($this->getStubPath('space.png'))
            ->preservingOriginal()
            ->toMediaCollection('images');

        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->pause(200)
                ->assertValue('@media-library-field-name', 'space');
        });
    }

    #[Test, DataProvider('routeNames')]
    public function it_can_upload_and_display_a_single_file(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->waitFor('.media-library-thumb-img')
                ->press('@submit')
                ->waitForText('Your form has been submitted')
                ->assertSee('Your form has been submitted')
                ->refresh();

            $this->assertCount(1, FormSubmission::first()->getMedia('images'));
        });
    }

    #[Test, DataProvider('routeNames')]
    public function uploading_a_file_and_removing_it_before_submitting_the_form_will_not_attach_media_to_the_model(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->waitForText('Download')
                ->assertVisible('@thumb')
                ->press('@remove')
                ->waitUntilMissing('@thumb')
                ->press('@submit')
                ->waitForText('Your form has been submitted')
                ->assertSee('Your form has been submitted')
                ->assertMissing('@thumb');

            $this->assertCount(0, FormSubmission::first()->getMedia('images'));
        });
    }

    #[Test, DataProvider('routeNames')]
    public function the_name_field_of_a_collection_item_is_required(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->waitForText('Download')
                ->type('@media-library-field-name', '   ') // needed to make test pass
                ->type('@media-library-field-name', '')
                ->pause(300)
                ->press('@submit')
                ->waitForText('is required')
                ->assertSee('is required');
        });
    }

    #[Test, DataProvider('routeNames')]
    public function it_will_not_display_the_main_uploader_when_the_maximum_amount_of_uploads_has_been_reached(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->pause(800)
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->pause(800)
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->pause(800)
                ->assertMissing('@main-uploader');
        });
    }

    #[Test, DataProvider('routeNames')]
    public function a_new_collection_item_can_be_replaced(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->pause(800)
                ->attach('@uploader', $this->getStubPath('logo.png'))
                ->pause(800)
                ->press('@submit')
                ->pause(800);

            $this->assertEquals('logo.png', FormSubmission::first()->getFirstMedia('images')->file_name);
        });
    }

    #[Test, DataProvider('routeNames')]
    public function the_collection_will_only_allow_acceptable_files(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->attach('@main-uploader', $this->getStubPath('test.pdf'))
                ->pause(800)
                ->waitForText('You must upload a file of type')
                ->assertSee('You must upload a file of type');
        });
    }

    #[Test, DataProvider('routeNames')]
    public function an_existing_item_can_be_deleted(string $routeName)
    {
        /** @var FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create(['name' => 'test']);

        $formSubmission
            ->addMedia($this->getStubPath('space.png'))
            ->preservingOriginal()
            ->toMediaCollection('images');

        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->assertVisible('@thumb')
                ->press('@remove')
                ->waitUntilMissing('@thumb')
                ->press('@submit')
                ->waitForText('Your form has been submitted')
                ->assertSee('Your form has been submitted')
                ->assertMissing('@thumb');

            $this->assertCount(0, FormSubmission::first()->getMedia('images'));
        });
    }

    #[Test, DataProvider('routeNames')]
    public function an_existing_item_can_be_replaced(string $routeName)
    {
        /** @var FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create(['name' => 'test']);

        $formSubmission
            ->addMedia($this->getStubPath('space.png'))
            ->preservingOriginal()
            ->toMediaCollection('images');

        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@uploader', $this->getStubPath('logo.png'))
                ->pause(800)
                ->press('@submit')
                ->pause(800);

            $this->assertEquals('logo.png', FormSubmission::first()->getFirstMedia('images')->file_name);
        });
    }

    public static function routeNames(): array
    {
        return [
            ['vue.collection'],
            ['react.collection'],
            ['blade.collection'],
            ['livewire.collection'],
        ];
    }
}
