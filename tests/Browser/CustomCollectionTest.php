<?php

namespace Tests\Browser;

use App\Models\FormSubmission;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CustomCollectionTest extends DuskTestCase
{
    /** @test */
    public function it_will_save_custom_properties()
    {
        FormSubmission::truncate();

        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/livewire/collection-custom-property')
                ->type('name', 'My name')
                ->attach('@main-uploader', $this->getStubPath('space.png'))
                ->waitForText('Download')
                ->type('@medialibrary-field-name', 'this is the name')
                ->type('@medialibrary-extra-field', 'this is the extra field')
                ->press('@submit');

            /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $media */
            $media = FormSubmission::find(1)->getFirstMedia('images');

            $this->assertEquals('this is the name', $media->name);
            $this->assertEquals('this is the extra field', $media->getCustomProperty('extra_field'));
        });
    }
}
