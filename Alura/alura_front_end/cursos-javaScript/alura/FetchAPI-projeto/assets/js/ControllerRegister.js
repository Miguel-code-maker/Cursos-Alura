import { Formulario } from './Formulario.js';

export class ControllerRegister extends Formulario {
    constructor() {
        super();
        this.init();
    }

    init() {
        this.form.addEventListener("submit", e => {
            e.preventDefault();
            this.getValuesCliente()

        });
    
    }

    getValuesCliente() {
        if (this.cpf.valida(this.cpfForm.value)) {
          this.adicionar(this.nomeForm.value, this.cpfForm.value);
          this.formClean(this.cpfForm, this.nomeForm);
        } else {
          alert("error cpf invalido");
        }
      }
    
      adicionar(novoNome, novoCpf) {
        const bodyRead = JSON.stringify({
          nome: novoNome,
          cpf: novoCpf,
        });
        const resBody = this.service.post(
          "http://localhost:4000/clientes/cliente",
          bodyRead
        );
        const url = window.location;
        url = 'http:localhost:5000/clientes.html'
      }
}