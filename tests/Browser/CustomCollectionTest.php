<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CustomCollectionTest extends DuskTestCase
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
    public function it_will_save_custom_properties(string $routeName)
    {
        $this->browse(function (Browser $browser) use ($routeName) {
            $browser
                ->visit(route($routeName))
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->waitForText('Download')
                ->type('@media-library-field-name', 'this is the name')
                ->type('@media-library-extra-field', 'this is the extra field')
                ->pause(500)
                ->press('@submit')
                ->waitForText('Your form has been submitted');


            /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $media */
            $media = FormSubmission::first()->getFirstMedia('images');

            $this->assertEquals('this is the name', $media->name);
            $this->assertEquals('this is the extra field', $media->refresh()->getCustomProperty('extra_field'));

            $browser
                ->pause(500)
                ->press('@submit');

            $this->assertEquals('this is the extra field', $media->refresh()->getCustomProperty('extra_field'));
        });
    }

    /**
     * @test
     *
     * @dataProvider routeNames
     */
    public function it_will_use_the_initial_custom_properties(string $routeName)
    {
        /** @var FormSubmission $formSubmission */
        $formSubmission = FormSubmission::create(['name' => 'test']);

        $extraFieldValue = 'this is the extra field';

        $formSubmission
            ->addMedia($this->getStubPath('space.png'))
            ->preservingOriginal()
            ->withCustomProperties(['extra_field' => $extraFieldValue])
            ->toMediaCollection('images');

        $this->browse(function (Browser $browser) use ($formSubmission, $extraFieldValue, $routeName) {
            $browser
                ->visit(route($routeName))
                ->pause(500)
                ->press('@submit')
                ->waitForText('Your form has been submitted');


            $media = $formSubmission->refresh()->getFirstMedia('images');

            $this->assertEquals($extraFieldValue, $media->refresh()->getCustomProperty('extra_field'));
        });
    }

    public function routeNames(): array
    {
        return [
            ['vue.collection-custom-property'],
            ['react.collection-custom-property'],
            ['blade.collection-custom-property'],
            ['livewire.collection-custom-property'],
        ];
    }
}
