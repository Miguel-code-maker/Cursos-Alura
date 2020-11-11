export class ListaClientes {
  constructor() {
    this._listaClientes = [];
  }

  add(cliente) {
    this._listaClientes.push(cliente);
    console.log(this._listaClientes);
  }

  remove() {
    this._listaClientes = [];
  }

  get clientes() {
    return [].concat(this._listaClientes);
  }
}
