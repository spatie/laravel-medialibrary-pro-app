## Laravel Media Library Pro Demo App

![Dusk](https://github.com/spatie/laravel-medialibrary-pro-app/workflows/Dusk/badge.svg)

This repo contains a Laravel project to demonstrate to possibilities of [Laravel Media Library Pro](https://medialibrary.pro).

## Getting started

In order to use this app you should have [a Media Library Pro license](https://spatie.be/products/media-library-pro).

After you clone the repo, perform these steps:

- copy `env.example` to `.env` and fill in values that makes sense for your environment
- create a `auth.json` file in the root of the project and put your media library pro license in there (more info in the docs)
- run `composer install`
- run `yarn` and `yarn run dev` (or the npm equivalent)
- run `php artisan migrate`
- browse to the project. (when using valet: visit `http://laravel-medialibrary-pro-app.test`)
- enjoy!

## Documentation

You can find the full documentation on Media Library Pro [on our website](https://spatie.be/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/introduction).

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-medialibrary.jpg?t=2" width="419px" />](https://spatie.be/github-ad-click/laravel-medialibrary)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Local development

These instructions should only be used by Spatie team members that need to work on the assets.

- In a separate folder, run git clone git@github.com:spatie/medialibrary-pro-js.git
- In that project, run yarn setup
- When that command has finished successfully, yarn setup in this project
- Go to http://laravel-medialibrary-pro-app.test/react or http://laravel-medialibrary-pro-app.test/vue to try it out
