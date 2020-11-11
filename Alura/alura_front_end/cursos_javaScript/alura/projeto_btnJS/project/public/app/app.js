import { handleStatus, log, timeOutPromise, delay, retry } from './utils/promise-helprs.js';
import './utils/array-helprs.js';
import { notasService as service } from './nota/service.js';
import { takeUntil, debounceTime, partilize, pipe } from './utils/operators.js';
import { EventEmitter } from './utils/event-emitter.js';


const clickButton = pipe(
    partilize(takeUntil, 3),
    partilize(debounceTime, 500)
);

document.querySelector('#myButton').onclick = clickButton(() =>
    retry(3, 2000,() => timeOutPromise(5000, service.sumItens('2143')))
        .then(total => EventEmitter.emit('itensTotaled', total))
        .catch(console.log) //mesma coisa de fazer normalmente
);
