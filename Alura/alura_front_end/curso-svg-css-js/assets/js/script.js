import { Cards } from './Cards.js';
import { LetterFooter } from './LetterFooter.js';

window.onload = () => {
    const animationCards = new Cards();
    document.addEventListener('scroll', animationCards.scrollCards.bind(animationCards));

    const lettFooter = new LetterFooter();
    setInterval(() => {
        lettFooter.animatinInMove();
    },600)
}