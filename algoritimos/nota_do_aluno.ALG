Algoritmo "semnome"
// 
//  
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 7/9/2020
Var
// Seção de Declarações das variáveis 
   nota1, nota2, res: real
   a: caracter
Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
   escreval("====================")
   escreval(" escola do irinel ")
   escreval("====================")
   escreva("qual foi sua primeira nota?")
   leia(nota1)
   escreva("qual foi sua segunda nota?")
   leia(nota2)
   res <- (nota1 + nota2) / 2
   se (res >= 7) entao
      escreva("aeeee garai tu passou")
   senao
        se (res >=5) e (res < 7) entao
           escreva("se safo por pouco mas ta de recuperacao")
        senao
             escreva("toma seu mane nao passou ksksk")
        fimse
   fimse
Fimalgoritmo