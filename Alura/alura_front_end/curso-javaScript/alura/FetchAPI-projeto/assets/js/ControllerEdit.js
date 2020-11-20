import { Formulario } from './Formulario.js';

export class ControllerEdit extends Formulario {
    constructor() {
        super();
        this.feito = false;
        this.id = this.getId();
        this.init();
    }

    init() {
        setInterval(() => {
            if (this.feito) {
                this.form.addEventListener('submit', e => {
                    e.preventDefault();
                    this.setData()  
                });
                this.feito = false;
            } else {
                return;
            }
        }, 500);
        
    }

    getId() {
        const url = new URL(window.location);
        const id = url.searchParams.get('id');
        this.getData(id);
        return id;
    }

    getData(id) {
        this.service.get("http://localhost:4000/clientes/cliente", id)
        .then(cliente => {
            this.cpfForm.value = cliente[0].cpf;
            this.nomeForm.value = cliente[0].nome;
        })
        this.feito = true;
    }

    setData() {
        if (!this.cpf.valida(this.cpfForm.value)) {
            alert("cpf invalido pf Tentar novamente");
            return;
        }
        const readyBody = JSON.stringify({
            nome: this.nomeForm.value,
            cpf: this.cpfForm.value
        })
        this.service.update("http://localhost:4000/clientes/cliente", this.id, readyBody)
        this.formClean(this.cpfForm, this.nomeForm);
    }
}