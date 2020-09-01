
import * as React from 'react';

type Props = {
   token: string;
};

export default function Csrf({ token }: Props) {
   return (
      <input type="hidden" name="_token" defaultValue={token}/>
   );
}
