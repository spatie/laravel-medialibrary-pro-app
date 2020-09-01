import * as React from 'react';

type Props = {
   children: React.ReactNode;
   method?: string;
   ref?: React.RefObject<HTMLFormElement> | undefined;
};

export default function Form({ children, method = "POST", ref = undefined }: Props) {
   return (
      <form method={method} className="grid gap-8 justify-items-start" ref={ref}>
         { children }
      </form>
   );
}
