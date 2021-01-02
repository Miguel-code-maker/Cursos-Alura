export const getForCep = input => {
    const cepNumbers = input.value.replace(/\D/g, '');

    if (input.validity.valid) {
        const url = `https://viacep.com.br/ws/${cepNumbers}/json/`;
        const options = {
            method: "GET",
            mode: "cors",
            headers: {
                "content-type": "application/json;charset=utf-8"
            }
        }
        fetch(url, options)
        .then(response => response.json())
        .then(data => {
            if(data.erro) {
                input.setCustomValidity("Este CEP não é valido.");
                console.log('oii')

                return;
            }
            input.setCustomValidity("");
            fillFild(data);
            return;
        });
    }
}

const fillFild = data => {
    const logradouro = document.querySelector('#logradouro');
    const city = document.querySelector('#cidade');
    const state = document.querySelector('#estado');

    logradouro.value = data.logradouro;
    city.value = data.localidade;
    state.value = data.uf;

}