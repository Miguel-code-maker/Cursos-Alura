import { Cards } from './Cards.js';

window.onload = () => {
    const animationCards = new Cards();
    document.addEventListener('scroll', animationCards.scrollCards.bind(animationCards))
}