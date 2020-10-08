//class abstrada
export class Conta {
    constructor(saldoInicial, cliente, agencia) {
        if (this.constructor == Conta) {
            throw new Error("voce não deveria esta criando essa instaciar um objeto tipo conta diretamente, pois ela é uma class abstrata");
        }
        this._saldo = saldoInicial;
        this._cliente = cliente;
        this._agencia = agencia;
    }

    set cliente(novoValor) {
        if (novoValor instanceof Cliente) {
            this._cliente = novoValor;
        }
    }

    get cliente() {
        return this._cliente;
    }

    get agencia() {
        return this._agencia;
    }

    get saldo() {
        return this._saldo;
    }
    //metodo abstrata
    sacar(valor) {
        throw new Error("erro ao chamar o metodo sacar da conta é abstrato")
    }


    _sacar(valor) {
        if (valor <= this._saldo && valor > 0) {
            this._saldo -= valor;
            return valor;
        }
    } 

    depositar(valor) {
        if (valor < 0) return;
        this._saldo += valor;
    }

    transferir(valor, cliente) {
        if (valor <= this.saldo || valor > 0) {
            this.sacar(valor);
            cliente.depositar(valor);
        }
    }
}