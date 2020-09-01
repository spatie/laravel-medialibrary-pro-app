
import * as React from 'react';

type Props = {
   children: React.ReactNode;
   label?: string;
};

export default function Field({ children, label = '' }: Props) {
   return (
      <div className="grid gap-2 w-full max-w-2xl">
        { label &&
         <label className="font-bold text-xs text-gray-500 uppercase tracking-widest">{ label }</label>
         }
         { children }
      </div>
   );
}
