const p = document.querySelector('.p__teste');
const apiFake = [
    {
        nome: "não__sei",
        cpf: "não__sei"
    },
    {
        nome: "continuo",
        cpf: "sem saber"
    },
    {
        nome: "porque eu ainda",
        cpf: "saberia?"
    }
];

const apiFake2 = [
    {
        nome: "continuo",
        cpf: "sem saber"
    },
    {
        nome: "porque eu ainda",
        cpf: "saberia?"
    }
];


const filter = apiFake.filter(api =>
															!apiFake2.some(apiExistente =>
																						 JSON.stringify(apiExistente) == JSON.stringify(api)));

console.log(filter);

filter.forEach(api => p.innerHTML += ` ${api.nome} `)