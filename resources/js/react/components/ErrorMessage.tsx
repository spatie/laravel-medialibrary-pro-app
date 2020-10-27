import * as React from 'react';

export default function ErrorMessage({ children }: { children: React.ReactNode }) {
    if (!children) {
        return null;
    }

    return <div className="rounded-sm text-xs mb-8 px-4 py-2 bg-red-100 text-red-500">{children}</div>;
}
