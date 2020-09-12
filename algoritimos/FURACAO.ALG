Algoritmo "furacao"
// 
//  
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 10/9/2020
Var
// Seção de Declarações das variáveis 
   a, b, res: inteiro
   funcao soma(x, y: inteiro) :inteiro
   var
       s: inteiro
   inicio
       s <- x + y
       retorne s
   fimfuncao
Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
   escreva("escreva outro numero: ")
   leia(a)
   escreva("escreva outro numero: ")
   leia(b)
   res <- soma(a, b)
   escreva("A soma entre os dois numeros e: ", res)

Fimalgoritmo