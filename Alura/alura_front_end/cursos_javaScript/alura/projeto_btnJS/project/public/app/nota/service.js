import { handleStatus } from '../utils/promise-helprs.js';
import { partilize, pipe } from '../utils/operators.js';
import { Maybe } from '../utils/Maybe.js'

const getItensFromNotas = notasM => notasM.map(notas => notas.$flatMap(nota => nota.itens));
const filterItensbyCode = (code, itensM) => itensM.map(itens => itens.filter(item => item.codigo == code));
const sumItensValue = itensM => itensM.map(itens => itens.reduce((preIten, itenAtual) => preIten+itenAtual.valor, 0));  

const API = 'http://localhost:3000/notas';

export const notasService = {
    
    listAll () {
        
        return fetch(API)
            .then(handleStatus)
            .then(Maybe.of)
            .catch(error => {
                console.log(error);
                return Promise.reject('Não foi posivel buscar as notas!!');
            })
    },
    

    sumItens(code) {
        const filterItens = partilize(filterItensbyCode, code);
        const sumItens = pipe(getItensFromNotas, filterItens, sumItensValue);
        return this.listAll().then(sumItens).then(result => result.getOrElse(0))
    }
}