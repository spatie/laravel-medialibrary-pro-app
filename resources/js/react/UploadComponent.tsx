import * as React from 'react';
import { useMedialibrary, MediaFormValues } from '@spatie/medialibrary-pro-react';
import MedialibraryClass from '@spatie/medialibrary-pro-core';
import { Medialibrary } from '@spatie/medialibrary-pro-core/dist/Medialibrary';
import useDragula from './useDragula';
import PreviewImage from './PreviewImage';

type Props = {
    name: string;
    initialValue: MedialibraryClass['state']['media'];
    errors: { [key: string]: any };
    tempEndpoint: string;
};

export default function UploadComponent({ name, initialValue, /* errors, */ tempEndpoint }: Props) {
    const {
        state,
        getImgProps,
        getNameInputProps,
        getCustomPropertyInputProps,
        getFileInputProps,
        removeMediaObject,
        setMediaOrder,
        replaceObjectMedia,
    } = useMedialibrary({
        initialMedia: initialValue,
        endpoint: tempEndpoint,
    });

    const { dragulaDecorator, drake } = useDragula();

    const fileInputRef = React.useRef<null | HTMLInputElement>(null);

    React.useEffect(() => {
        if (drake) {
            drake.on('dragend', e => {
                setMediaOrder(
                    Array.from(e.parentElement?.children || []).map(object => {
                        return object.getAttribute('data-medialibrary-uuid') as string;
                    })
                );
            });
        }
    }, [drake]);

    if (!state.media) {
        return null;
    }

    return (
        <div>
            <input type="file" className="hidden" multiple {...getFileInputProps()} ref={fileInputRef} />

            <div className="cursor-pointer p-4 border border-dashed" onClick={() => fileInputRef.current?.click()}>
                {/* TODO: dropzone */}
                <p className="text-center">Click here or drag a file to add media…</p>
            </div>

            <div ref={dragulaDecorator}>
                {state.media.map((object: Medialibrary.MediaObject) => (
                    <div className="border m-2 p-2 relative" key={object.uuid} data-medialibrary-uuid={object.uuid}>
                        <span
                            style={{ top: '5px', right: '5px' }}
                            className="absolute cursor-pointer"
                            onClick={() => removeMediaObject(object)}
                        >
                            x
                        </span>

                        <PreviewImage
                            getImgProps={() => getImgProps(object)}
                            onReplace={(file: File) => replaceObjectMedia(object, file)}
                        />

                        <progress max="100" value={object.upload.uploadProgress} />

                        <input placeholder="image name" {...getNameInputProps(object)} />

                        <input
                            placeholder="username (custom property)"
                            {...getCustomPropertyInputProps(object, 'username')}
                        />
                    </div>
                ))}
            </div>

            <MediaFormValues name={name} mediaState={state.media} />
        </div>
    );
}
