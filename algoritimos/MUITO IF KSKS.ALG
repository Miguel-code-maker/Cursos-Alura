Algoritmo "muito if ksks"
// 
//  
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 9/9/2020
Var
// Seção de Declarações das variáveis 
     nome1, nome2, nome3, nome4: caractere
     nota1, nota2, nota3, nota4: real
Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
   escreval("Aluno 1")
   escreva("Qual o nome do aluno?")
   leia(nome1)
   escreva("Qual a nota do aluno?")
   leia(nota1)
   escreval("====================")
   escreval("Aluno 2")
   escreva("Qual o nome do aluno?")
   leia(nome2)
   escreva("Qual a nota do aluno?")
   leia(nota2)
   escreval("====================")
   escreval("Aluno 3")
   escreva("Qual o nome do aluno?")
   leia(nome3)
   escreva("Qual a nota do aluno?")
   leia(nota3)
   escreval("====================")
   escreval("Aluno 4")
   escreva("Qual o nome do aluno?")
   leia(nome4)
   escreva("Qual a nota do aluno?")
   leia(nota4)
   escreval("====================")
   se (nota1 > nota2) e (nota1 > nota3) e (nota1 > nota4) entao
       escreva("a maior nota e do ", nome1, " com a nota", nota1)
   senao
       se (nota2 > nota1) e (nota2 > nota3) e (nota2 > nota4) entao
       escreva("a maior nota e do ", nome2, " com a nota", nota2)
       senao
           se (nota3 > nota1) e (nota3 > nota2) e (nota3 > nota4) entao
           escreva("a maior nota e do ", nome3, " com a nota", nota3)
           senao
              se (nota4 > nota1) e (nota4 > nota2) e (nota4 > nota3) entao
              escreva("a maior nota e do ", nome4, " com a nota", nota4)
              fimse
           fimse
       fimse
   fimse
Fimalgoritmo