-- guia select 
select * from cursos; -- seleciona tudas as colunas do cursos

-- como seleciona  de uma certa ordem
select * from cursos
order by nome; -- ordernado por nome de A ate Z

-- se colocar desc bota ordem do nome mais de Z ate A se eu quise A ate Z coloca nada ou asc
select * from cursos
order by nome desc;

-- select para filtra que coluna vc quer que apareça
select nome, carga, ano from cursos; -- filtro para aparecr a coluna nome carga e ano

-- da para mostra da forma que vc quise 
select ano, nome, carga from cursos; -- vai aparecr ano depois nome depois carga

-- filtra linha
select * from cursos
where ano = '2016'; -- seleciona tudo que tem o ano "2016"

-- operadores relacionais
select * from cursos
where ano <= '2015' -- pode colocar operadores relacionais os basicos sao "=" "!= ou <>" ">" "<" ">=" "<="

-- outros operadores
select * fron cursos
where ano between '2014' and '2016'; -- between é entre entao mostre  tudo entre "2014" e "2016"  


-- outroo 
select * from cursos
where ano in (2016, 2016) -- so mostra os cursos em 2014 e 2016 e não 2015
order by ano;

-- operadoris logicos 
select * from cursos
where carga > 35 and totaulas < 30 --fala que a carga e maior de 35 e total de aula meno que 30 e o and tenque ser um e outro se nao nao vai k
order by ; --alem and tem o or que serve um e o outro

-- outro operador que so pega palavras com a letra escolida no começo da frase ou no meio ou no fim depende como vc configura mesmo com acento
select * from cursos
where nome like 'p%' -- like e semelhança com a letra p e o "%" seguido de qualquer coisa ex: "P"yton
order by ano desc; -- se eu colocace "%p%" ele pegaria qualquer palavra que tem p ex: Word"P"res com a letra p se eu colocase "%p" ele escolheria so palavra com o final p ex: PH"P"
-- da para colocar "ph%p%" pegaria "photoshop", "php", "php7", "php4" da para colocar "ph%p_" o parametro "_" significa que tamque ter algo depois entao ele pegaria "php7" "php4"
-- se colocar dois "__" obriga que tenha dois caracteres

-- ele mostra so uma vez os registro de nacionalidade repetidos ou seja para vc saber quais paises que estao cadastrado sem repetiçao
select distinct nacionalidade from cursos; -- mesmo se tiver mil pessoas que mora no brasil e uma em horlando vai aparecer uma vez brasil e uma vez horlando 

-- conta  
select count(*) from cursos --counte  tudo   de   curso     que    a carga  seja maior   que 40;
where carga > 40;           -- count   *    from  cursos   where   carga       >            40;

-- mostra qual e o maior ou menor
select max(carga) from cursos; -- seleciona a maior carga da tabela curso é "60"
--ou
select max(totalas) from cursos
where ano = 2020; --fala o maior total de aulas dos cursos de 2020 vai mostra 20

--mostra o menor
select nome, min(totaulas) from cursos
where ano = 2020; -- vai mostra modelagem 3D totaulas 12 obs: mesmo se tiver dois cursos com 12 totaulas ele so vai mostra um nome

-- soma
select sum(totaulas) from cursos
where ano = '2020'; -- ele soma o total de aulas de 2020 e mostra no meu caso 32

-- soma e da a media ou seja soma tudo e divide pelo tatal de aulas somado
select avg(totaulas) from cursos
where ano = '2020'; -- mostra a media que no meu caso e "16.000" mais na verdade e 16

exercicios
--01
select * from garfanhotos
where sexo = 'F';

--02
select * from garfanhotos
where nacimento between '2000-01-01' and '2015-12-31'
order by ano;

--03
select nome from garfanhotos
where profissao = 'programador' and sexo = 'F'
order by nome;

--04
select * from garfanhotos
where sexo = 'F' and nacionalidade = 'Brasil' and nome like 'J%'
order by nome;

--05
select nome, nacionalidade from garfanhotos
where sexo = 'M' and nome like '%silva%' and nacionalidade != 'Brasil' and peso < '100'
order by nome;

--06
select max(altura) from garfanhotos
where sexo = 'M' and nacionalidade = 'Brasil';

--07
select avg(peso) from garfanhotos
order by nome;

--08
select min(peso) from garfanhotos
where sexo = 'F' and nacionalidade != 'Brasil' and nascimento between '1990-01-01' and '2000-12-31'
order by nome; 

--09
select sum(sexo = 'F') from garfanhotos
where altura > '1,90';


-- assista mais uma vez e muiiiito dificil de entender mais e muito fodaaa

-- agrupa todos que tem o mesmo valor no registro mas de diferença do distinct ele pode conta 
select carga, count(carga) from cursos -- mas de difetença e que da pra contar 
group by carga; -- mesma funçao que o distinct
-- exenplo  |_carga_||count_|
--			|___8___||___2__| 2 de 8 horas
--			|___9___||___1__| 1 de 9 horas
--			|__10___||___2__| 2 de 10 horas


-- agora para conta quantos cursos que tem o totaulas = 30
select carga, count(*) from cursos where totaulas = '30' -- ele conta e como tem o para metro group ele fala quantos tem de cada
group by carga; -- agroupa as cargas repetidas
--exemplo
--| carga || count |
--|  40	  ||   2   |
--|  60	  ||   4   |

-- mais coizinhas
select carga, count(nome) from cursos --seleciona carga e conta quantos tem agrupados porque tem o parametro 
group by carga -- agrupa carga
having count(nome) > 3; -- fala que so vai mostra aqueles que vao ter a counta por grupo de carga maior que 3
-- obs o having so funciona se for count ou se voce tiver agrupado ele ou seja carga ex carga > 40


-- faz uma conta por grupo mersma coisa que a totaulas = 30 e carga 2 de 8 horas
select ano, count(*) from cursos
group by ano
order by count(*) desc; -- orderna por maior

-- select dentro de select parecendo uma variavel // e usar o having como where
select avg(carga) from cursos; -- vai dar a media da carga

select carga, count(*) from cursos
where ano > '2015' -- parece muito uma variavel
group by carga
having carga > (select avg(carga) from cursos);

-- outro exercicios
--01
select profissao, count(*) from garfanhotos
group by profissao;
--02
select sexo, count(sexo) from garfanhotos
where nascimento > '2005-01-01'
group by sexo;
--03
select nacionalidade, count(*) from garfanhotos
where nacionalidade != 'Brasil'
group by nacionalidade
having count(nacionalidade) > '3';
--04
select altura, count(*) from gafanhotos where peso > '100' 
group by altura
having altura > (select avg(altura) from gafanhotos);

