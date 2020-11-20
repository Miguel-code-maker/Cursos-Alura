import Foto from "./Foto";

export default class FotosServices {
    constructor(resource) {
        this._resource = resource('v1/fotos{/id}');
    }

    list() {
        return this._resource.query().then(res => res.json(),err => {
            console.log(err);
            throw new Error("Não foi posivel obter as fotos tente novamente mais tarde");
        })
    }

    rigister(foto) {
        if(foto._id) {
            return this._resource.update({ id: foto._id }, foto)
        }

        return this._resource.save(foto);
    }

    trash(id) {
        return this._resource.delete({ id }).then(null,err => {
            console.log(err);
            throw new Error("Não foi posivel excluir as fotos");
        });
    }

    get(id) {
        return this._resource.get({ id }).then(res => res.json());
    }
    
}