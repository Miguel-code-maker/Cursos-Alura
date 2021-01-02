import { validateDate } from './validateDate.js';
import { validateCpf } from './validateCpf.js';
import { getForCep } from './getForCep.js';

function customErrorMessage(type, validity) {
    let message = '';
    const typeErrors = [
        'valueMissing',
        'typeMismatch',
        'tooShort',
        'rageUnderflow',
        'customError',
        'patternMismatch'
    ];

    const errorMessage =  {
        email: {
            valueMissing: "O E-mail é necesario.",
            typeMismatch: "Esse Email não é valido."
        },

        password: {
            valueMissing: 'A senha é necessaria.',
            tooShort: "A senha deve conter mais de 4 caracteres."
        },

        date: {
            valueMissing: 'A data de nasimento é necessaria.',
            rageUnderflow: "A data mínima é 01/01/1901",
            customError: "A Idade minima é 18 anos."
        },

        cpf: {
            valueMissing: 'O CPF é necessario.',
            customError: "Este CPF não é válido"
        },

        cep: {
            valueMissing: 'O CEP é necessario.',
            patternMismatch: "Esse CEP é invalido.",
            customError: "Esse CEP é invalido"
        },

        rg: {
            valueMissing: 'O RG é necessario.',
        },

        logradouro: {
            valueMissing: 'O logradouro é necessario.',
        },

        city: {
            valueMissing: 'A cidade é necessaria.',
        },

        state: {
            valueMissing: 'O estado é necessario.',
        },

        price: {
            valueMissing: "O preço é necessario.",
            customError: "O preço não pode ser menor que zero."
        },
        
        nameProduct: {
            valueMissing: "O nome do Produto é necessario."
        },

        descriptionProduct: {
            valueMissing: "A descrição do produto é necesaria."
        }

    }

    typeErrors.forEach(error => {
        if (validity[error]) {
            message = errorMessage[type][error]
        }
    });

    return message
}

export const validateInput = input => {
    const classErrorInput = 'possui-erro-validacao';
    const classErrorElement = 'erro-validacao';
    const elementParentInput = input.parentNode;
    const errorElementExisten = elementParentInput.querySelector(`.${classErrorElement}`);
    const errorElement = errorElementExisten || document.createElement('div');
    
    const type = input.dataset.type;
    const validateSpecific = {
        date: input => validateDate(input),
        cpf: input => validateCpf(input),
        cep: input => getForCep(input),
        price: input => {
            const price = input.formatToNumber();
            if (price === 0) {
                input.setCustomValidity('Tem error aqui');
                return;
            }
            input.setCustomValidity('');
            return;
        }
    }

    if (validateSpecific[type]) {
        validateSpecific[type](input)
    }
    
    setTimeout(() => {
        const elementIsValidate = input.validity.valid;

        if (!elementIsValidate) {
            errorElement.className = classErrorElement;
            input.classList.add(classErrorInput);
            errorElement.textContent = customErrorMessage(type, input.validity);
            input.after(errorElement);
        } else {
            errorElement.remove();
            input.classList.remove(classErrorInput);
        }
    }, 100)
}