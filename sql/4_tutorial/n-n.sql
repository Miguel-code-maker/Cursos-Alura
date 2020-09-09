--n-n um numero indetermindao de alunos assisti o curso e um curso é assistido por um número indetermindao de curso: n-n ou muitos para muitos
create table assistir( -- crea uma tabela assistir
    id int auto_increment, --criando a chave estrangera
    data date,
    idgafanhotos int, --dando o nome da chave estrangera
    idcursos int, --dando nome a chave estrangera
    primary key(id), --colocando a chave primaria
    foreign key(idgafanhotos) references gafanhotos(id), -- colocando a chave estrangera de referencia ao id banco de dados gafanhotos
    foreign key(idcursos) references cursos(idcursos) --colocando a chave estrangera de referencia ao id do banco de dados cursos
)default charset = utf8; -- deixando utf8

--colocando os cursos feitos pelos garfanhotos
insert into assistir values -- colocar valores no assistir
(default, '2020-01-04', '1', '2') -- os valores

-- para selecionar e junta as três tabelas 
 select a.idgafanhotos, g.nome, a.idcursos, c.nome from garfanhotos as g inner join assistir as a on g.id = a.idgafanhotos inner join cursos as c on c.idcursos = a.idcursos
--seleciona id e nomes dos gafanhotos e de cursos  com  gafanotos como g junto com assistir como a onde id de g = o do id a junto de cursos como c onde id de cursos e = id de a 

-- ou pode ser escrito assim 
select a.idgarfanhotos, g.nome, a.idcurso, c.nome from garfanhotos as g 
inner join assistir as a on g.id = a.idgarfanhotos
inner join cursos as c ON c.idcurso = a.idcurso
order by g.nome;