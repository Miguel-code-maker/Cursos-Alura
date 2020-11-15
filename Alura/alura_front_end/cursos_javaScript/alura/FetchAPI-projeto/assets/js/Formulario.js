import { Service } from "./service.js";
import { Cpf } from "./Cpf.js";

export class Formulario {
    constructor() {
        this.service = new Service();
        this.cpf = new Cpf();
        this.form = document.querySelector("[data-form]");
        this.nomeForm = this.form.querySelector("[data-nome]");
        this.cpfForm = this.form.querySelector("[data-cpf]");
    }

    formClean(...args) {
        args.forEach((element) => {
          element.value = "";
        });
        args[0].focus();
    }
}