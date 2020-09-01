import * as React from 'react';

type Props = {
   children: React.ReactNode;
};

export default function Grid({ children }: Props) {
   return (
      <div className="grid gap-8 justify-items-start">
         { children }
      </div>
   );
}
