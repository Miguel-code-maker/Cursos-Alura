-- dois comandos novos update delete e truncate 

update cursos -- fala que vai modificar a linha da coluna da tabela cursos
set nome = 'PHP', ano = '2015' -- modifica o nome para "php" e o ano para "2015" mas eu posso modificar so o nome
where idcurso = '4' -- precisso indentificar quem vai ser modificado
limit 1; -- po segurança muuuuiiito importante para se vc cometer um erro nao caga tudo e so um banca de dados

-- apaga linhas 
delete from cursos --apaga tudo sem condiçoes

--apaga so o que ele fala
delete from cursos --fala que quer apagar algo da tabela cursos
where = idcurso = '8' -- mostra o que quer apagar da tebela 
limit 1; -- segurança e importante

-- apagar todas as linhas da tabela mas nao colunas
truncate cursos; -- apaga tudo :,(

