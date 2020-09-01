
import * as React from 'react';

type Props = {
   children: React.ReactChildren | string;
};

export default function Info({ children }: Props) {
   return (
      <div className="rounded-sm mb-8 px-4 py-2 bg-blue-100 text-blue-500">
         { children }
      </div>
   );
}
