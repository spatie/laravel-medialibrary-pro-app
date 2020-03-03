import * as React from 'react';
import Dragula from 'react-dragula';
import 'react-dragula/dist/dragula.min.css';
import { Drake } from 'dragula';

export default function useDragula() {
    const [drake, setDrake] = React.useState<Drake | null>(null);

    const dragulaDecorator = React.useCallback(
        (container: HTMLDivElement | null) => {
            if (container) {
                setDrake(Dragula([container], {}));
            }
        },
        [Dragula]
    );

    return { dragulaDecorator, drake };
}
