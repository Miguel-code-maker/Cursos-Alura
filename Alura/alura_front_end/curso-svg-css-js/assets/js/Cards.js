export class Cards {

    constructor() {
        this._card = 1;
        this._cardEsq = document.querySelector('.card-esq');
        this._cardDir = document.querySelector('.card-dir');
        this._referencePosition = document.querySelector("#section-dicas");
        this._svgList = document.querySelectorAll('.cards svg')
        this.scrollCards();
        this.zonnAnimation();
    }

    zonnAnimation() {
        this._svgList.forEach(svg => svg.classList.add('inMove'));
    }

    scrollCards() {
        window.requestAnimationFrame(this.calculationScroll.bind(this));
    }
    
    calculationScroll() {
        const position = this._referencePosition.getBoundingClientRect()['y'];;
        if (window.innerWidth > 610) {
            if (position > 50) {
                this._cardEsq.style=`transform: translate(-${(position + 25)/2}px);`;
                this._cardDir.style=`transform: translate(${(position-25)/2}px);`
            } else if(position < 50) {
                this._cardEsq.style=`transform: translate(0%);`;
                this._cardDir.style=`transform: translate(-0%);`
            }
        } else {
            this._cardEsq.style=`transform: translate(0%);`;
            this._cardDir.style=`transform: translate(-0%);`
        }
    }
}
