import * as React from 'react';

type Props = {
    name: string;
    initialValue: { [key: string]: any };
    errors: { [key: string]: any };
    tempEndpoint: string;
};

export default function UploadComponent({ name, initialValue, errors, tempEndpoint }: Props) {
    return <div></div>;
}
