import Vue from 'vue';

Vue.directive('transform', {
    bind(el, binding, vnode) {
        let rotation = 0;
        let click = 0;
        el.addEventListener('dblclick', (e => {
            let increment = binding.value || 90;
            let efect;
            click += 1;

            if (!binding.arg || binding.arg == 'rotate') {
                if (binding.modifiers.reverse) {
                    rotation -= increment;
                } else {
                    rotation += increment;
                }
                efect = `rotate(${rotation}deg)`

            } else if (binding.arg == 'scale' && click % 2 != 0) {
                efect = `scale(${increment})`
            } else if (binding.arg == 'scale' && click % 2 == 0) {
                efect = `scale(${1})`;
            }

            if (binding.modifiers.animate) el.style.transition = "transform 0.5s";
            el.style.transform = efect;
        }))
    }
})