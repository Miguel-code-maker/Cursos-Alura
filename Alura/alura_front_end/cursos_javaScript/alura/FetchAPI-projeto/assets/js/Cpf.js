export class Cpf {
  checkCpfInvalid(cpf) {
    const listInvalidCpf = [
      "11111111111",
      "22222222222",
      "33333333333",
      "44444444444",
      "55555555555",
      "66666666666",
      "77777777777",
      "88888888888",
      "99999999999",
      "00000000000",
    ];

    return listInvalidCpf.indexOf(cpf) == -1;
  }

  checkFirstDigt(cpf) {
    const weight = 11;
    const totalDigit = 9;
    const checkDigit = parseInt(cpf.substring(9, 10));
    console.log(checkDigit);
    
    return this.verifyDigit(cpf, totalDigit, weight, checkDigit);
  }

  checkSecondDigt(cpf) {
    const weight = 12;
    const totalDigit = 10;
    const checkDigit = parseInt(cpf.substring(10, 11));

    return this.verifyDigit(cpf, totalDigit, weight, checkDigit);
  }

  sunCpf(cpf, totalDigit, weight) {
    let soma = 0;
    for (let i = 1; i <= totalDigit; i++) {
      soma += parseInt(cpf.substring(i - 1, i)) * (weight - i);
    }
    return soma;
  }

  verifyDigit(cpf, totalDigit, weight, checkDigit) {
    const sun = this.sunCpf(cpf, totalDigit, weight);
    console.log(sun)
    const rest = (sun * 10) % 11;
    console.log(rest)
    if (rest === 10 || rest === 11) rest = 0;
    return (rest === checkDigit);
  }

  valida(cpf) {
    return (this.checkFirstDigt(cpf) && this.checkSecondDigt(cpf) && this.checkCpfInvalid(cpf));
  }
}