interface Window {
    oldValues: {
        name: string;
        singleMedia: import('@spatie/medialibrary-pro-core/dist/index').default['state']['media'];
        media: import('@spatie/medialibrary-pro-core/dist/index').default['state']['media'];
    };
    errors: { [key: string]: Array<string> };
    tempEndpoint: string;
    csrfToken: string;
}
