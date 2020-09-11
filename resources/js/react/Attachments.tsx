import * as React from 'react';
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-attachment/dist';
import H2 from './components/H2';
import Field from './components/Field';
import Grid from './components/Grid';

export default function Attachments() {
    return (
        <>
            <H2>React: multiple attachment (max 3 items)</H2>

            <Grid>
                <Field label="files">
                    <MediaLibraryAttachment
                        name="media"
                        uploadEndpoint="/temp-upload"
                        validation={{ accept: ['image/png'], maxSize: 2048 }}
                        multiple
                        maxItems={3}
                    />
                </Field>
            </Grid>
        </>
    );
}
