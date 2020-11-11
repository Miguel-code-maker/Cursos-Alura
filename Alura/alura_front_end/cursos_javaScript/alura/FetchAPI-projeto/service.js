import { Clientes } from './Clientes.js'

export class Service {
    
    post(url, readyBody) {
        return fetch(url, {
            method: "POST",
            headers: {
                'content-type': 'application/json'
            },
            body: readyBody
        }).then(res => res.body);
    }
    
    get(url) {
        return fetch(url)
            .then(res => res.json())
            .then(clientes => clientes.map(cliente => new Clientes(cliente.nome, cliente.cpf)));
    }
    
}