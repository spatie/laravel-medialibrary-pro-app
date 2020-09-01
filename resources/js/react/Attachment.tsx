import * as React from 'react';
import MediaLibraryAttachment from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-attachment/dist';
import H2 from './components/H2';
import Field from './components/Field';
import Input from './components/Input';
import Csrf from './components/Csrf';
import Grid from './components/Grid';

export default function Attachment() {
    const formRef = React.useRef<HTMLFormElement>(null);

    function afterMediaUpload({ success }: { success: boolean }) {
        if (success) {
            formRef.current?.submit();
        }
    }

    return (
        <>
            <H2>React: attachment</H2>

            <form method="POST" ref={formRef}>
                <Grid>
                    <p>
                        Sync – form submit, uploads automatically
                    </p>

                    <Csrf token={window.csrfToken}/>

                    <Field label="Name">
                        <Input name="name" placeholder="name" />
                    </Field>

                    <Field label="file">
                        <MediaLibraryAttachment
                            name="media"
                            initialValue={window.oldValues.media}
                            uploadEndpoint={window.uploadEndpoint}
                            translations={{
                                hint: { singular: 'Add a file!', plural: 'Add some files!' },
                                replace: 'drag or click to replace',
                            }}
                            validation={{ accept: ['image/png'], maxSize: 1048576 }}
                            validationErrors={window.errors}
                            beforeUpload={() => {}}
                            afterUpload={afterMediaUpload}
                        ></MediaLibraryAttachment>
                    </Field>
                </Grid>
            </form>
        </>
    );
}
