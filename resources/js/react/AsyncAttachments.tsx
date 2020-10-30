import * as React from 'react';
import { MediaLibraryAttachment } from 'media-library-pro-react-attachment';
import { MediaLibrary } from 'media-library-pro-core/dist/types';
import { MediaLibrary as MediaLibraryClass } from 'media-library-pro-core/dist';
import PageTitle from './components/PageTitle';
import Button from './components/Button';
import Field from './components/Field';
import Grid from './components/Grid';
import ErrorMessage from './components/ErrorMessage';
import Input from './components/Input';
import Axios from 'axios';

export default function AsyncAttachments() {
    const [value, setValue] = React.useState<{
        name: string;
        media: {
            [uuid: string]: MediaLibrary.MediaAttributes;
        };
    }>({
        name: '',
        media: {},
    });
    const [validationErrors, setValidationErrors] = React.useState<MediaLibrary.State['validationErrors']>({});
    const [isUploadSuccess, setIsUploadSuccess] = React.useState(false);

    const mediaLibrary = React.useRef<MediaLibraryClass | null>(null);

    function submit() {
        setIsUploadSuccess(false);
        setValidationErrors({});

        Axios.post('', value)
            .then(res => {
                if (res.data.success) {
                    setIsUploadSuccess(true);
                    setValue({ name: '', media: {} });

                    mediaLibrary.current?.changeState(state => {
                        state.media = [];
                    });
                }
            })
            .catch(error => {
                console.error(error);

                if (error && error.response && error.response.data) {
                    setValidationErrors(error.response.data.errors);
                }
            });
    }

    return (
        <div>
            {(Object.keys(validationErrors).length || isUploadSuccess) && (
                <div
                    className={`rounded-sm mb-8 px-4 py-2 ${
                        Object.keys(validationErrors).length ? 'bg-red-100 text-red-500' : 'bg-green-100 text-green-500'
                    }`}
                >
                    {Object.keys(validationErrors).length ? (
                        <>Please correct the errors in the form</>
                    ) : (
                        <>Your form has been submitted</>
                    )}
                </div>
            )}

            <PageTitle>React: attachments with async submit</PageTitle>

            <Grid>
                <Field label="Name">
                    <Input
                        name="name"
                        type="text"
                        placeholder="Your first name"
                        value={value.name}
                        onChange={name => setValue(value => ({ ...value, name }))}
                    />
                    <ErrorMessage>{validationErrors.name}</ErrorMessage>
                </Field>

                <Field label="file">
                    <MediaLibraryAttachment
                        name="media"
                        initialValue={value.media}
                        validationRules={{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
                        validationErrors={validationErrors}
                        multiple
                        setMediaLibrary={mediaLib => (mediaLibrary.current = mediaLib)}
                        onChange={media => setValue(value => ({ ...value, media }))}
                    ></MediaLibraryAttachment>
                </Field>

                <Button onClick={submit} dusk="submit">
                    Submit
                </Button>
            </Grid>
        </div>
    );
}
