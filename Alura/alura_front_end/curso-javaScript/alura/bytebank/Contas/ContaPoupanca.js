import { Conta } from "../Conta.js";

export class ContaPoupanca extends Conta {
    constructor (saldoInicial, cliente, agencia) {
        super(saldoInicial, cliente, agencia);
    }

    sacar(valor) {
        let taxa = 1;
        valor = taxa * valor;
        super._sacar(valor)
        return valor / taxa;
    }
}
