//import
import {Cliente} from "./Cliente.js"
import {Gerente} from "./Funcionarios/Gerente.js";
import {Diretor} from "./Funcionarios/Diretor.js";
import {SistemaDeAutenticacao} from "./SistemaDeAutenticacao.js";

const cliente = new Cliente("alice", 186431851424)
const diretor = new Diretor( "Rodrigo", 1000, 12345678900);
const gerente = new Gerente("Ricardo", 5000, 12348448755);
diretor.cadastrarSenha("123456789");
gerente.cadastrarSenha("123")
const diretorEstaLogado = SistemaDeAutenticacao.login(diretor, "123456789");

const gerenteEstaLogado = SistemaDeAutenticacao.login(gerente, "123");

const clienteEstaLogado = SistemaDeAutenticacao.login(cliente, '112233')

console.log(gerenteEstaLogado)
console.log(diretorEstaLogado)
console.log(clienteEstaLogado)