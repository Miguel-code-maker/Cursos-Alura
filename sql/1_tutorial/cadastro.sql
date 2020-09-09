-- criando minha tabela com utf8 
create database cadastro
default character set utf8
default collate utf8_general_ci;
-- para tirar o banco de dados ou tabelas 
-- drop database cadastro; ou "table" 
-- criando tabela com utf8
create table pessoas (
    id int not null AUTO_INCREMENT, --fala que o id e intero não pode ser vaziu e tem um auto incremento ou seja o primeiro cadastrado vai se 00001 o segundo 002
    nome varChar(30) not null, -- not null fala que não pode registra se não tiver valor 
    nacimento date, 
    sexo enum ('M','F'), --valor enum limita e fala que so pode ser incerido 'M' ou 'F'
    peso decimal(5,2), -- desimal e simples vai te 5 casas e duas vão se decimal = 000,00
    altura decimal(3,2), -- mesma coisa 0,00
    nacionalidade varchar(20) default 'brazil', --fala que se o valor não for inserido vai sr brazil
    primary key(id) --cria uma chave primaria com id mais poderia ser com nome mais como nome nao e unico cria com id cep nº de matricula etc
)default charset = utf8; -- deixa utf8 :)

discribe pessoas; -- descrevel a tabela pessoas ou 
dic pessosas; -- mesma coisa

-- inserino os dados de pessoas abaixo:
insert into pessoas -- para isseri algum valor par pessoas 
(nome, nacimento, sexo, peso, altura, nacionalidade) -- ordem para ser colocada
values -- os valores que vão ser colocada
('Gordofredo', '1984-01-02', 'M', '78.5', '1.83', 'Brazil'); --os valores colocados


select * from pessoas; -- par seleciona tudo * de pessoas // mostra ou seleciona

alter table pessoas -- adicionar uma nova coluna
add colum profissao varchar(10) after nome;--adicionando "after nome" ele cria a coluna depois do nome se eu colocar nada ele coloca em ultimo lugar e se eu colocar "first" ele fica em primeiro  -- adiciona uma coluna pessoas


alter table pessoas
drop column profissao; -- exclui profissao
--modifica a coluna
alter table pessoas
modify column profissao varchar(30) not null default '';  -- modifica a column desejada

-- modifica o nome e a coluna
alter table pessoas
change column profissao prof varchar(20) not null default ''; --colocar o nome antigo e novo e recolocar todas as cofigurações de volta se não vai ser descartado

--renomia a tabela inteira
alter table pessoas 
rename to garfanhotos; -- mudor o nome para garfanhotos

-- outras config de create table
create table if not exists curso ( --if not exists significa que ele nao vai cria a tabela se ela existir
	nome varchar(30) not null unique, -- unique significa que ele nao vai deixa cria outro registro com o mesmo nome de curso 
    descricao text,
    carga int unsigned, --siguinifica que ele nao vai deixa numeros negativos
    totalula int,
    ano year default '2020'
)default charset = utf8;

