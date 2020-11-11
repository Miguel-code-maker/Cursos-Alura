export class Clientes {
    constructor(nome, cpf) {
        this._nome = nome;
        this._cpf = cpf;
    }
    
    get nome() {
        return this._nome;
    }
    
    get cpf() {
        return this._cpf
    }
}