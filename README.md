## Laravel Media Library Pro Demo App

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

## Local development

These instructions should only be used by Spatie team members that need to work on the assets.

- In a separate folder, run git clone git@github.com:spatie/medialibrary-pro-js.git
- In that project, run yarn setup
- When that command has finished successfully, yarn setup in this project
- Go to http://laravel-medialibrary-pro-app.test/react or http://laravel-medialibrary-pro-app.test/vue to try it out
