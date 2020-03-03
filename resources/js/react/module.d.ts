declare module 'react-dragula' {
    export default function(
        containers: Array<HTMLElement>,
        options: import('dragula').DragulaOptions
    ): import('dragula').Drake;
}
