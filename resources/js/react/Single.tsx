import * as React from 'react';
import MediaSingleComponent from '../../../vendor/spatie/laravel-medialibrary-pro/ui/medialibrary-pro-react-single';

export default function Single() {
    const formRef = React.useRef<HTMLFormElement>(null);

    function afterMediaUpload({ success }: { success: boolean }) {
        if (success) {
            formRef.current?.submit();
        }
    }

    return (
        <form method="POST" ref={formRef}>
            <h1 className="h1">Single image (avatar, …)</h1>

            <input type="hidden" name="_token" defaultValue={window.csrfToken}></input>

            <p>
                <input type="text" name="name" placeholder="name" />
            </p>

            <MediaSingleComponent
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
            ></MediaSingleComponent>
        </form>
    );
}
