import Register from './Components/register/register.vue';
import Home from './Components/home/home.vue';

export const routes = [
    { path: '', component: Home, name: "home", title: "home", menu: true},
    { path: '/cadastro/', component: Register, name:"cadastro" , title: "cadastro" ,menu: true},
    { path: '/cadastro/:id', component: Register, name:"altera" , title: "cadastro", menu: false}
];