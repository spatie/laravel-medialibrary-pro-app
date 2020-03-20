interface Window {
    oldValues: {
        name: string;
        singleMedia: ReadonlyArray<import('@spatie/medialibrary-pro-core/src/types').MediaLibrary.MediaAttributes>;
        media: ReadonlyArray<import('@spatie/medialibrary-pro-core/src/types').MediaLibrary.MediaAttributes>;
    };
    errors: { [key: string]: Array<string> };
    tempEndpoint: string;
    csrfToken: string;
}
