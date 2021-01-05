import { initFormEdit } from "./componentes/edita/form-edicao";
const { initRegister } = require("./componentes/cadastro/componente-cadastro");
const { initTable } = require("./componentes/lista/listagem-cliente")

const routes = {
    "/": initTable,
    "/cadastro": initRegister,
    "/editar": initFormEdit
}

const rootDiv = document.querySelector('[data-container]');

export const nav = pathname => {

    window.history.pushState({}, pathname, window.location.origin + pathname);

    rootDiv.innerHTML = "";
    const initRoutes = routes[window.location.pathname]

    rootDiv.appendChild(initRoutes())
}

window.nav = nav;

window.onpopstate = () => {
    rootDiv.innerHTML = "";
    rootDiv.appendChild(routes[window.location.pathname]());
}
