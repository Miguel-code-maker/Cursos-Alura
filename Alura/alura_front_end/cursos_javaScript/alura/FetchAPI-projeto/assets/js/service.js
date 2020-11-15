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
    
    get(url, id='') {
        if (id != '') {
            url += '/'+id;
        }
        return fetch(url)
            .then(res => res.json())
            .then(clientes => clientes.map(cliente => new Clientes(cliente.nome, cliente.cpf, cliente.id)));
    }

    delete(url, id) {
        return fetch(url+id, {
            method: 'DELETE'
        })
    }

    update(url, id, readyBody) {
        return fetch(url+'/'+id, {
            method: 'PUT',
            headers: {
                'Content-type': 'application/json'
            },
            body: readyBody
        }).then(res => res.body);
    }
    
}