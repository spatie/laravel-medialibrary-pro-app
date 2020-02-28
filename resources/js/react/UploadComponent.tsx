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
    const { mediaLibrary, mediaHelpers, mediaState } = useMediaLibrary({
        initialMedia: initialValue,
        endpoint: tempEndpoint,
        resourceName: name,
    });

    if (!mediaLibrary) {
        return null;
    }

    return (
        <div>
            <input type="file" multiple {...mediaHelpers.getFileInputProps()} />
            <ul>
                {mediaState.media.map((object: MediaLibrary.MediaObject, i: number) => (
                    <div style={{ border: '1px solid black', position: 'relative' }} key={object.uuid}>
                        <span
                            style={{ position: 'absolute', top: '5px', right: '5px', cursor: 'pointer' }}
                            onClick={() => mediaLibrary.removeMediaObject(object.uuid)}
                        >
                            x
                        </span>

                        {/*  {{ mediaLibrary.getFormInputs(object) }} ? */}
                        {Object.keys(mediaLibrary.value[i]).map(key => (
                            <input key={key} {...mediaHelpers.getInputProps(object, key)} type="hidden" />
                        ))}

                        <img {...mediaHelpers.getImgProps(object)} style={{ height: '50px', width: '50px' }} />

                        <input placeholder="image name" {...mediaHelpers.getInputProps(object, 'name')} />

                        <input
                            placeholder="username (custom property)"
                            {...mediaHelpers.getInputProps(object, 'custom_properties.username')}
                        />
                    </div>
                ))}
            </ul>
        </div>
    );
}
