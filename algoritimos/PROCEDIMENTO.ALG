Algoritmo "procedimento"
// 
//  
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 10/9/2020
Var
// Seção de Declarações das variáveis 
   a, b, res: inteiro

   procedimento soma (x, z: inteiro)
   var
      res: inteiro
   inicio
       res <- x + z
       escreval("O resultado e: ", res)
       
   fimprocedimento
Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
    escreva("digire um numero: ")
    leia(a)
    escreva("escreva outro numero: ")
    leia(b)
    soma(a, b)
    soma(a+1, b+1)
    soma(a+2, b+2)
Fimalgoritmo