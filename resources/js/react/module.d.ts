type MediaAttributes = import('media-library-pro-core/src/types').MediaLibrary.MediaAttributes;

interface Window {
    oldValues: {
        name: string;
        singleMedia: ReadonlyArray<MediaAttributes>;
        media: ReadonlyArray<MediaAttributes> | { [uuid: string]: MediaAttributes };
        images: { [uuid: string]: MediaAttributes };
        downloads: { [uuid: string]: MediaAttributes };
    };
    initialValues: { [key: string]: { [uuid: string]: MediaAttributes } };
    errors: { [key: string]: Array<string> };
    csrfToken: string;
}
