import * as React from 'react';
import MediaSingleComponent from '@spatie/medialibrary-pro-react-single';

export default function() {
    return (
        <form method="POST">
            <h1 className="h1 mt-16">Single image (avatar, …)</h1>

            <input type="hidden" name="_token" defaultValue={window.csrfToken}></input>

            <MediaSingleComponent
                name="single-media"
                initialValue={window.oldValues.singleMedia}
                tempEndpoint={window.tempEndpoint}
                translations={{
                    hint: { singular: 'Add a file!', plural: 'Add some files!' },
                    replace: 'drag or click to replace',
                }}
                validation={{ accept: ['image/png'], maxSize: 1048576 }}
                initialErrors={window.errors}
                beforeUpload={() => new Promise(resolve => resolve())}
            ></MediaSingleComponent>

            <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
                Submit
            </button>
        </form>
    );
}
