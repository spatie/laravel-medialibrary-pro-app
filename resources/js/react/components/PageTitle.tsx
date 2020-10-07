

import * as React from 'react';

type Props = {
   children: React.ReactNode;
};

export default function PageTitle({ children }: Props) {
   return (
      <h2 className="mb-6 text-xl font-bold uppercase tracking-widest">{ children }</h2>
   );
}
