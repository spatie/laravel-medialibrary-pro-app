import * as React from 'react';
import { useMediaLibrary, MediaFormValues } from '@spatie/medialibrary-pro-react';
import MediaLibraryClass from '@spatie/medialibrary-pro-core';
import { MediaLibrary } from '@spatie/medialibrary-pro-core/dist/Medialibrary';
/* import Dragula from 'react-dragula'; */

type Props = {
    name: string;
    initialValue: MediaLibraryClass['state']['media'];
    errors: { [key: string]: any };
    tempEndpoint: string;
};

export default function UploadComponent({ name, initialValue, /* errors, */ tempEndpoint }: Props) {
    const { getImgProps, getInputProps, getFileInputProps, mediaState, removeMediaObject } = useMediaLibrary({
        initialMedia: initialValue,
        endpoint: tempEndpoint,
    });

    if (!mediaState) {
        return null;
    }

    /* const dragulaDecorator = componentBackingInstance => {
        if (componentBackingInstance) {
            let options = {};
            Dragula([componentBackingInstance], options);
        }
    }; */

    return (
        <div>
            <input type="file" multiple {...getFileInputProps()} />

            {mediaState.map((object: MediaLibrary.MediaObject) => (
                <div className="border relative my-2" key={object.uuid}>
                    <span
                        style={{ position: 'absolute', top: '5px', right: '5px', cursor: 'pointer' }}
                        onClick={() => removeMediaObject(object.uuid)}
                    >
                        x
                    </span>

                    <img {...getImgProps(object)} style={{ height: '50px', width: '50px' }} />

                    <progress max="100" value={object.upload.uploadProgress} />

                    <input placeholder="image name" {...getInputProps(object, 'name')} />

                    <input
                        placeholder="username (custom property)"
                        {...getInputProps(object, 'custom_properties.username')}
                    />
                </div>
            ))}

            <MediaFormValues name={name} mediaState={mediaState} />
        </div>
    );
}
