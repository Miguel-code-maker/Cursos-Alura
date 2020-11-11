import { ListaClientes } from "./Lista-Clientes.js";
import { Clientes } from "./Clientes.js";
import { Service } from "./service.js";

export class ClienteController {
  constructor(page) {
    this._listaClientes = new ListaClientes();
    this.service = new Service();
    if (page == "index") {
      this.importarClientes();
      this.importarClientes();
      this.importarClientes();
      this.importarClientes();
      this.importarClientes();
    } else if (page == "register") {
      const form = document.querySelector("[data-form]");
      form.addEventListener("submit", (e) => this.getValuesCliente(e));
    }
  }

	importarClientes() {
		this.service.get('http://localhost:4000/clientes')
			.then(cl => {
				const clientes = cl.filter(cliente =>
					!this._listaClientes.clientes.some(clienteExistente => 
						JSON.stringify(cliente) == JSON.stringify(clienteExistente)))
					clientes.forEach(cliente => this._listaClientes.add(cliente))
					this.showClientes()
			}).catch(console.log)
	}

  getValuesCliente(e) {
    e.preventDefault();
    const form = document.querySelector("[data-form]");
    const nome = form.querySelector("[data-nome]");
    const cpf = form.querySelector("[data-cpf]");
    this.adicionar(nome.value, cpf.value);
  }

  adicionar(novoNome, novoCpf) {
    this._listaClientes.add(new Clientes(novoNome, novoCpf));
    const bodyRead = JSON.stringify({
      nome: novoNome,
      cpf: novoCpf,
    });
    const resBody = this.service.post(
      "http://localhost:4000/clientes/cliente",
      bodyRead
    );
  }

  showClientes() {
    const tableBody = document.querySelector("#table__body");
    this._listaClientes.clientes.forEach((cliente) => {
      const template = `
                <tr>
                    <td>${cliente.cpf}</td>
                    <td>${cliente.nome}</td>
                </tr>
            `;

      tableBody.innerHTML += template;
    });
  }
}

// this.service
// .get("http://localhost:4000/clientes")
// .then((cl) =>
//   cl.filter((cliente) =>
//     !this._listaClientes.clientes.some((clienteExistente) =>
//       JSON.stringify(cliente) == JSON.stringify(clienteExistente)
//     )
//   )
// )
// .then((clientes) => {
//   clientes.forEach((cliente) => this._listaClientes.add(cliente));
//   this.showClientes();
// })
// .catch(console.log);
