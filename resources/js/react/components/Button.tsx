import * as React from 'react';

type Props = {
    children: React.ReactNode | string;
    onClick?: () => void;
    disabled?: boolean;
    [key: string]: any
};

export default function Button({ children, onClick, disabled = false, ...props }: Props) {
    return (
        <button
            onClick={onClick}
            disabled={disabled}
            className="group flex items-center pl-6 h-10 bg-red-500 hover:bg-red-600 text-white font-bold text-xs uppercase tracking-widest shadow-md hover:shadow disabled:opacity-50"
            {...props}
        >
            {children}{' '}
            <span className="ml-3 px-3 border-l border-white border-opacity-50 opacity-75 group-hover:opacity-100 group-hover:text-yellow-500">
                {'->'}
            </span>
        </button>
    );
}
