export const handleStatus = res => res.ok ? res.json() : Promise.reject(res.statusText);

export const log = parm => {
    console.log(parm);
    return parm;
}

export const timeOutPromise = (miliseconds, promise) => {
    const promiseTimeOut = new Promise((resolve, reject) => setTimeout(() => resolve(`limite de tempo exedido (limite: ${miliseconds}ms)`), miliseconds))
    return Promise.race([promise, promiseTimeOut])
    
}


export const delay = miliseconds => res => 
    new Promise((resolve, reject) => setTimeout(() => 
        resolve(res), miliseconds));


export const retry = (indice, miliseconds, fnPromise) => {
    return fnPromise().catch(error => {
        console.log(indice);
        return delay(miliseconds)().then(() => 
            indice > 1 
            ? retry(--indice, miliseconds, fnPromise) 
            : Promise.reject(error))
    })
}
