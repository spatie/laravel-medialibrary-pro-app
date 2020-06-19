interface Window {
    oldValues: {
        name: string;
        singleMedia: ReadonlyArray<
            import('../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-core/src/types').MediaLibrary.MediaAttributes
        >;
        media: ReadonlyArray<
            import('../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-core/src/types').MediaLibrary.MediaAttributes
        >;
    };
    errors: { [key: string]: Array<string> };
    tempEndpoint: string;
    csrfToken: string;
}
