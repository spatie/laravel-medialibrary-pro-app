
import * as React from 'react';

type Props = {
   name: string;
   placeholder?: string;
   type?: string;
   defaultValue?: string;
};

export default function Input({ name, placeholder = '', defaultValue = '', type = 'text' }: Props) {
   return (
      <input type={type} id={name} name={name} defaultValue={defaultValue} placeholder={placeholder} className="h-10 px-3 border-gray-200 text-gray-700 placeholder-gray-300 border-2 focus:outline-none focus:border-yellow-500 shadow-inner" />
   );
}
