import * as React from 'react';
import ReactDOM from 'react-dom';
import UploadComponent from './UploadComponent';

ReactDOM.render(
    <div>
        <form action="single-upload" method="POST">
            <p>
                <input name="name" type="text" placeholder="name" value="" />
            </p>

            <p>
                <UploadComponent
                    name="media"
                    initialValue={{}}
                    errors={{}}
                    tempEndpoint="temp-upload" /* Get from blade */
                ></UploadComponent>
            </p>

            <p>
                <button>Submit</button>
            </p>
        </form>
    </div>,
    document.getElementById('app')
);
