export class Clientes {
    constructor(nome, cpf, id) {
        this._id = id;
        this._nome = nome;
        this._cpf = cpf;
    }
    
    get nome() {
        return this._nome;
    }
    
    get cpf() {
        return this._cpf;
    }

    get id() {
        return this._id;
    }
}