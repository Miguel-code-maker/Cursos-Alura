Algoritmo "Menu"
// 
//  
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 9/9/2020
Var
// Seção de Declarações das variáveis
   escolhar, num, cont: inteiro


Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
   escreval("=================")
   escreval("|     MENU      |")
   escreval("| [1] De 1 a 10 |")
   escreval("| [2] De 10 a 1 |")
   escreval("| [3] Sair      |")
   escreval("=================")
   leia(escolhar)
   enquanto (escolhar <> 3) faca
      se (escolhar = 1) entao
         num <- 0
         enquanto (num < 10) faca
             num <- num + 1
             escreva(num)
         fimenquanto
      senao
          se (escolhar = 2) entao
             cont <- 11
             enquanto (cont >= 1) faca
                 cont <- cont - 1
                 escreva(cont)
             fimenquanto
          senao
               se (escolhar = 3) entao
                  escreva("Tchao")
               senao
                  escreval("opçao invalida")
               fimse
          fimse
      fimse
      escreval(" ")
      escreval("=================")
      escreval("|     MENU      |")
      escreval("| [1] De 1 a 10 |")
      escreval("| [2] De 10 a 1 |")
      escreval("| [3] Sair      |")
      escreval("=================")
      leia(escolhar)
   fimenquanto
Fimalgoritmo