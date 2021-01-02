export const validateDate = input => {
    const dataBirth = new Date(input.value);
    const newDate = new Date();

    const dateMake18 = new Date(
        dataBirth.getUTCFullYear() + 18,
        dataBirth.getUTCMonth(),
        dataBirth.getUTCDay()
    );

    if (dateMake18 > newDate) {
        input.setCustomValidity("A Idade minima é 18 anos.");
        return "A Idade minima é 18 anos.";
    }

    input.setCustomValidity("");
    return;
}