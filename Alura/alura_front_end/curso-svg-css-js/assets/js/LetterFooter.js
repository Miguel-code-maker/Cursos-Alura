export class LetterFooter {
    constructor() {
        this.svg = document.querySelector('.lett__footer');
        this.filter = document.querySelector('#filter-turbulence');
        this.is = 1;
    }

    animatinInMove() {
        if (this.is == 1) {
            this.filter.attributes[2].value = "0.04";
            this.is = 2;
        } else if (this.is == 2) {
            this.is = 3;
            this.filter.attributes[2].value = "0.03";
        } else if (this.is == 3) {
            this.is = 4;
            this.filter.attributes[2].value = "0.02";
        } else {
            this.is = 1;
            this.filter.attributes[2].value = "0.05";
        }

    }
}