import * as React from 'react';
import useMediaLibrary from '@spatie/medialibrary-pro-react';
import MediaLibraryClass from '@spatie/medialibrary-pro-core';
import { MediaLibrary } from '@spatie/medialibrary-pro-core/dist/Medialibrary';

type Props = {
    name: string;
    initialValue: MediaLibraryClass['state']['media'];
    errors: { [key: string]: any };
    tempEndpoint: string;
};

export default function UploadComponent({ name, initialValue, errors, tempEndpoint }: Props) {
    /* const { state, fileInputProps } = useMediaLibrary({ initialMedia: initialValue, endpoint: tempEndpoint }); */
    const { mediaLibrary, mediaHelpers, mediaState } = useMediaLibrary({
        initialMedia: initialValue,
        endpoint: tempEndpoint,
        resourceName: 'media',
    });

    if (!mediaLibrary) {
        return null;
    }

    return (
        <div>
            <input type="file" multiple {...mediaHelpers.getFileInputProps()} />
            <ul>
                {mediaState.media.map((media: MediaLibrary.MediaObject, i) => (
                    <div style={{ border: '1px solid black' }} key={media.uuid}>
                        {Object.keys(mediaLibrary.value[i]).map(key => (
                            <input key={key} {...mediaHelpers.getInputProps(media, key)} type="hidden" />
                        ))}
                        <input placeholder="image name" {...mediaHelpers.getInputProps(media, 'name')} />
                        <img {...mediaHelpers.getImgProps(media)} style={{ height: '50px', width: '50px' }} />
                    </div>
                ))}
            </ul>
        </div>
    );
}
