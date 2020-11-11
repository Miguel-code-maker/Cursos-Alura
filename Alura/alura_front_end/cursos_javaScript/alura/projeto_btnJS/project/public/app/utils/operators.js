export const partilize = (fn, ...args) => fn.bind(null , ...args);

export const pipe = (...fns) => value => 
    fns.reduce((preValue, fn) => fn(preValue), value)

export const takeUntil = (time, fn) =>  
    () => time-- > 0 && fn(); 
    /*isso é a mesma coisa que o codigo a cima
    () => {
        if (time-- > 0) fn();
    }
    */

export const debounceTime = (milliseconds, fn) => { 
    let indiceTime = 0;
    return () => {
        clearTimeout(indiceTime)
        indiceTime = setTimeout(fn, milliseconds)
    }
}
