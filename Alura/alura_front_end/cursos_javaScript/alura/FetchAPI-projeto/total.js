class Clientes {
    constructor(nome, cpf) {
        this._nome = nome;
        this._cpf = cpf;
    }
    
    get nome() {
        return this._nome;
    }
    
    get cpf() {
        return this._cpf
    }
}

class ListaClientes {
    constructor() {
        this._listaClientes = [];

    }

    get clientes() {
        return this._listaClientes;
    }

    add(cliente) {
        this._listaClientes.push(cliente);
    }
    
    import(clientes) {
        clientes.forEach(cliente => this._listaClientes.push(cliente));
    }
}

class ClienteController {
    static _listaClientes = new ListaClientes();
    constructor() {
        this.importarClientes()
    }

    importarClientes() {
        fetch('http://localhost:4000/clientes')
        .then(res => res.json())
        .then(cl => {
            cl.forEach(cliente => {
                if (!ClienteController._listaClientes.clientes.some(clienteExistent => JSON.stringify(cliente) == JSON.stringify(clienteExistent))) {          
                    ClienteController._listaClientes.add(cliente)
                    this.mostrarClientes();
                }
                
            })
        })
    }

    getValuesCliente(e) {
        e.preventDefault();
        const form = document.querySelector('[data-form]');
        const nome = form.querySelector('[data-nome]');
        const cpf = form.querySelector('[data-cpf]');
        this.adicionar(nome.value, cpf.value);
    }

    adicionar(novoNome, novoCpf) {
        ClienteController._listaClientes.add(new Clientes(novoNome, novCopf))
        const bodyRead = JSON.stringify({
            nome: novoNome,
            cpf: novoCpf
        })
        return fetch('http://localhost:4000/clientes/cliente', {
            method: "POST",
            headers: {
                "content-type": "application/json"
            },
            body: bodyRead
        }).then(res => res.body);
    }

    mostrarClientes() {
        const tableBody = document.querySelector('#table__body');
        ClienteController._listaClientes.clientes.forEach(cliente => {
            const template = `
                <tr>
                    <td>${cliente.cpf}</td>
                    <td>${cliente.nome}</td>
                </tr>
            `;

            tableBody.innerHTML += template;
        })
    }
}





