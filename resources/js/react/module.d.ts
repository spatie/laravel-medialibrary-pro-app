type MediaAttributes = import('../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-core/src/types').MediaLibrary.MediaAttributes;

interface Window {
    oldValues: {
        name: string;
        singleMedia: ReadonlyArray<MediaAttributes>;
        media: ReadonlyArray<MediaAttributes> | { [uuid: string]: MediaAttributes };
    };
    errors: { [key: string]: Array<string> };
    tempEndpoint: string;
    csrfToken: string;
}
