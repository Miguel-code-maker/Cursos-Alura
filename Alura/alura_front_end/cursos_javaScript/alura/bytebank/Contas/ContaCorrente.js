import { Conta } from "../Conta.js";

export class ContaCorrente extends Conta {
    //static
    static numeroDeContas = 0;

    constructor(cliente, agencia) {
        super( 0, cliente, agencia);
        ContaCorrente.numeroDeContas += 1;
    }

    sacar(valor) {
        let taxa = 1.1;
        valor = taxa * valor;
        super._sacar(valor);
        return valor / taxa;
    }

}