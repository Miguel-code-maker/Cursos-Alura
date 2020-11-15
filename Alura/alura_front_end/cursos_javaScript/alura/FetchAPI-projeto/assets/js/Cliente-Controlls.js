import { ListaClientes } from "./Lista-Clientes.js";
import { Service } from "./service.js";

export class ClienteController {
  constructor(page) {
    this._listaClientes = new ListaClientes();
    this.service = new Service();
    this.tableBody = document.querySelector("#table__body");
    this.feito = false;
    this.init();    
  }

  init() {
    this.importarClientes();
    setInterval(() => {
      if (this.feito) {
        const btns = document.querySelectorAll('.btns');
        btns.forEach(btn => {
          btn.addEventListener('click', e => this.removeCliente(e))
        })
        this.feito = false;
      } else {
        return;
      }
    }, 500);
  }

  importarClientes() {
    this.service
      .get("http://localhost:4000/clientes")
      .then(cl =>
        cl.filter(cliente =>
          !this._listaClientes.clientes.some(clienteeExistente =>
            JSON.stringify(cliente) == JSON.stringify(clienteeExistente)
          )
        )
      )
      .then((clientes) => {
        if (clientes.length) {
          clientes.forEach(cliente => this._listaClientes.add(cliente));
          this.showClientes();
        }
      })
  }

  removeCliente(event) {
    event.preventDefault();
    const id = event.target.attributes['data-id'].value
    if (window.confirm(`vc tem certeza que deseja excluir o cliente ${this._listaClientes.getForIdName(id)}`)) {
      this.service.delete("http://localhost:4000/clientes/cliente/", id);
      this.importarClientes();
    }
  }

  showClientes() {
    this.tableBody.innerHTML = '';
    this._listaClientes.clientes.forEach((cliente) => {
      const template = `
        <tr>
            <td>${cliente.cpf}</td>
            <td>${cliente.nome}</td>
            <td>
              <button type="button" data-id="${cliente.id}" class="btn btn-danger btns">Excluir</buttom>
              <a href="./edita-clientes.html?id=${cliente.id}"><button type="button" class="btn btn-primary">Editar</button></a>
            </td>
        </tr>
      `;

      this.tableBody.innerHTML += template;
    });
    this.feito = true;
  }
}

