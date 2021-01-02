// function mascaraCpf(input, cpf=false) {
//     cpf = cpf ? cpf : input.value;
//     if (cpf.length == 11) {
//         let cpfEdit = cpf.substr(0, 3)+".";
//         cpfEdit += cpf.substr(3, 3)+".";
//         cpfEdit += cpf.substr(6, 3)+"-";
//         cpfEdit += cpf[9]+cpf[10];
//         input.value = cpfEdit;
//         return;
//     }
//     input.value = cpf;
// }

function cpfReissued(cpf) {
    const cpfReissued = [
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999'
    ]

    if (cpfReissued.includes(cpf)) {
        return true;
    }
    return false;

}

function calcDigit(cpf , multDigit) {
    const partCpf = cpf.substr(0, multDigit).split('');
    let multplication = multDigit + 1;
    
    const total = partCpf.reduce((result, atual) => result + atual * multplication--, 0);
    const rest = total % 11;

    let digit = 11 - rest;

    if (rest > 9) {
        digit = 0;
    }

    return digit;
}

export const validateCpf = input => {
    const cpf = input.value.replace(/\D/g, '');

    const fistDigit = Number(cpf.charAt(9));
    const secondDigit = Number(cpf.charAt(10));

    if (cpfReissued(cpf) || calcDigit(cpf, 9) != fistDigit || calcDigit(cpf, 10) != secondDigit) {
        input.setCustomValidity('Este cpf não é valido.')
        return;
    }
    
    input.setCustomValidity("");
    return;

}