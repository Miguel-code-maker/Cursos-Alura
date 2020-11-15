export class ListaClientes {
  constructor() {
    this._listaClientes = [];
  }

  add(cliente) {
    this._listaClientes.push(cliente);
  }

  removeAll() {
    this._listaClientes = [];
  }

  get clientes() {
    return [].concat(this._listaClientes);
  }

  getForIdName(id) {
    let name = '';
    this.clientes.map(idExistente => {
      if (idExistente.id == id) name = idExistente.nome;
    })
    return name;
  }
}
