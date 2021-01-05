import {
  listarClientes,
  deletaCliente,
} from './../../api/cliente.js';
import '../../assets/css/clientes.css';
import { initRegister } from '../cadastro/componente-cadastro.js';

const removeCliente = (id) => {
  if(confirm("Deseja deletar o cliente ?")){
    deletaCliente(id)
    setTimeout(() => window.location.reload(), 100);
  }
}

const createButtonRemove = id => {
  const button = document.createElement('button');
  button.classList.add('btn', 'btn-danger')
  button.innerHTML = "Excluir";

  button.addEventListener('click', () => {
    removeCliente(id);
  })

  return button;
}

const creatBodyTable = table => {
  const corpoTabela = document.createElement('tbody');

  const exibeCliente = (cpf, nome, id) => {
  const linha = document.createElement('tr');

  const conteudoLinha = `
    <td>${cpf}</td>
    <td>${nome}</td>
    <button type="button" class="btn btn-info" onclick="nav('/editar?id=${id}'); return false;">Editar</button>
  `;
  
    linha.innerHTML = conteudoLinha;
    linha.appendChild(createButtonRemove(id))
    return linha;
  };

  listarClientes().then( exibe => {
    exibe.forEach(indice => {
      corpoTabela.appendChild(exibeCliente(indice.cpf, indice.nome, indice.id))
    })
  })

  table.appendChild(corpoTabela)

}

export const initTable = () => {
  const content = `
    <thead class="thead-dark">
    <tr>
      <th scope="col">CPF</th>
      <th scope="col">Nome</th>
      <th scope="col"></th>
      <th><a id="btn-new-cliente" class="btn btn-primary" onclick="nav('/cadastro'); return false;">Novo Cliente</a></th>
    </tr>
    </thead>
  `;

  const table = document.createElement('table');
  table.innerHTML = content;
  table.classList.add('table');
  creatBodyTable(table)
  return table;
}  
  
 

