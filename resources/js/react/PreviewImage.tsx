import * as React from 'react';

type Props = {
    getImgProps: () => {
        src: string | undefined;
        alt: string;
    };
    onReplace: (file: File) => void;
};

export default function PreviewImage({ getImgProps, onReplace }: Props) {
    const fileInputRef = React.useRef<null | HTMLInputElement>(null);

    return (
        <div
            className="relative w-32 h-32 cursor-pointer overflow-hidden"
            onClick={() => fileInputRef.current?.click()}
        >
            <input
                type="file"
                className="hidden"
                ref={fileInputRef}
                onChange={(event: React.ChangeEvent<HTMLInputElement>) =>
                    onReplace((event.target.files as FileList)[0])
                }
            />

            {/* TODO: dropzone */}

            <img {...getImgProps()} className="h-full w-full object-cover" />
            <div className="absolute inset-0 opacity-0 hover:opacity-50 hover:bg-red-500 duration-150">
                <p className="text-center m-auto text-white">Click here or drag a file to add media…</p>
            </div>
        </div>
    );
}
