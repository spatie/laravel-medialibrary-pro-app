import * as React from 'react';
import MediaSingleComponent from '@spatie/medialibrary-pro-react-single';
import MediaLibraryClass from '@spatie/medialibrary-pro-core';

export default function AsyncSingle() {
    function submit() {
        // This can also be placed in the `afterUpload` prop of the component

        /* TODO:
        axios.post(…)
        .catch(errors => {
            // setValidationErrors({ [value[0].uuid]: ['kek'] });
            // format errors to looks like this: { "uuid": ["error"]}
            setValidationErrors(formattedErrors);
        });
        */
    }

    const [value, setValue] = React.useState(window.oldValues.media);
    const [validationErrors, setValidationErrors] = React.useState<MediaLibraryClass['validationErrors']>();

    return (
        <div>
            <MediaSingleComponent
                name="media"
                tempEndpoint={window.tempEndpoint}
                translations={{
                    hint: { singular: 'Add a file!', plural: 'Add some files!' },
                    replace: 'drag or click to replace',
                }}
                validation={{ accept: ['image/png'], maxSize: 1048576 }}
                validationErrors={validationErrors}
                initialValue={value}
                onChange={setValue}
            ></MediaSingleComponent>

            <button
                className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2"
                onClick={submit}
            >
                Submit
            </button>
        </div>
    );
}
