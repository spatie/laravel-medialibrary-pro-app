import * as React from 'react';
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-attachment/dist';
import { MediaLibrary } from 'medialibrary-pro-core/dist/types';
import H2 from './components/H2';
import Info from './components/Info';
import Button from './components/Button';
import Field from './components/Field';
import Grid from './components/Grid';

export default function AttachmentAsync() {
    function submit() {
        // This can also be placed in the `afterUpload` prop of the component
        /* TODO:
        axios.post(…)
        .catch(errors => {
            setValidationErrors(errors);
        });
        */

    }

    const [value, setValue] = React.useState(window.oldValues.media);
    const [validationErrors, setValidationErrors] = React.useState<MediaLibrary.State['validationErrors']>();

    return (
        <div>
            <H2>React: async attachment</H2>

            <Info>
                Axios
            </Info>

            <Grid>
                <Field label="file">
                    <MediaLibraryAttachment
                        name="media"
                        uploadEndpoint={window.uploadEndpoint}
                        translations={{
                            hint: { singular: 'Add a file!', plural: 'Add some files!' },
                            replace: 'drag or click to replace',
                        }}
                        validation={{ accept: ['image/png'], maxSize: 1048576 }}
                        validationErrors={validationErrors}
                        initialValue={value}
                        onChange={setValue}
                    ></MediaLibraryAttachment>
                </Field>

                <Button
                    onClick={submit}
                >
                    Submit
                </Button>
            </Grid>
        </div>
    );
}
