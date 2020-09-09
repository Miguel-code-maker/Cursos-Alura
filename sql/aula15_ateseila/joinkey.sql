--n-1 um gafanhot tem 1 curso preferido e um curso e preferido por varios gafanhotos

alter table gafanhotos -- fala que ira altera a tabela
add column cursopreferido int; -- adiciona uma coluna cursopreferido com um valor int ou inteiro

alter table gafanhotos
add foreign key (cursopreferido) -- ele adiciona uma chave estrangera
references cursos(idcursos); -- ele fala que a chave estrangera tem referencia da chave primaria de cursos que e idcursos

update gafanhotos -- update fala que vai modificar ou atualizar algum dado da linha da coluna da tabela gafanhotos
set cursopreferido = '6' where id = '1';  -- ele coloca o id de um curso de outra tabela onde o id do outro cara e '1' para fazer a referencia

-- como mostra junto o conteudo de cada banco de dados de uma so vez:
select gafanhotos.nome, cursos.nome, cursos.ano, from gafanhotos inner join cursos; -- ele fala para selecionar o nome dos gafanhotos o nome dos cursos e o ano do cursos de gafanhotos junto de cursos;
on cursos.idcursos = gafanhotos.cursopreferido --fala que idcursos e igual gafanhotos e muito importante na hora de usar o join
order by gafanhotos.nome; -- ordena gafanhotos pelos nomes
--vc pode criar avebriações dos nome de banco de dados com o comando 'as g'
select g.nome, c.nome, c.ano from gafanhotos as g inner join cursos as c
on c.idcursos = g.cursopreferido
order by g.nome;

-- pode se usar tambem outer left join e outer right join ele fala se vc que junta os dois mais um dos banco da esquerda ou direira
-- ai vc escolhe se voce escolher left(esquerda) ele vai mostra tambem as pessoas do banco gafanhotos que nao tem relaçao com nenhu dos cursos e nao vao mostra o da direita que e o da chave estrangera cursos que nao tem nenhuma relaçao com pessoas
select g.nome, c.nome, c.ano from gafanhotos as g left outer join cursos as c 
on c.idcursos = g.cursopreferido
order by g.nome;

-- obs: vc pode ussar abreviaçoes no inner join ou no left outer join simples so usando: 
-- join ou                   //inner join   \\
-- left join ou             //left outer join\\
-- right join ou           //right outer join \\ 