Algoritmo "seleçao de pessoas"
// 
//  
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 9/9/2020
Var
// Seção de Declarações das variáveis
   sexo,  continua: caractere
   idade, cor, totM, totF: inteiro


Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
    escreval("==========================")
    escreval("    SELETOR DE PESSOAS    ")
    escreval("==========================")
    repita
        totM <- 0
        totF <- 0
        escreva("Qual o sexo? [M/F] ")
        leia(sexo)
        escreva("Qual a idade? ")
        leia(idade)
        escreval("Qual a cor do cabelo? ")
        escreval("[1] Preto")
        escreval("[2] Castanho")
        escreval("[3] Loiro")
        escreval("[4] Ruivo")
        leia(cor)
        escreva("Quer continua[S/N] ")
        leia(continua)
        se (sexo = "M") e (idade = 18) e (cor = 2) entao
            totM <- totM + 1
        senao
           se (sexo = "F") e (idade >= 25) e (idade <= 30) e (cor = 3) entao
              totF <- totF + 1
           fimse
        fimse
    ate (continua = "n") ou (continua = "N")
    escreval("Total de homens com mais de 18 e cabelos castanhos e: ",totM)
    escreva("Total de Mulhere entre 25 e 30 e cabelos loiros e: ",totF)

   
   
Fimalgoritmo