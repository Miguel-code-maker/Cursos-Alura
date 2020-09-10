Algoritmo "repita"
// e um programa feito so para exclarecer o repita
//  
//
//
//
Var
// Seção de Declarações das variáveis 
   num, count: inteiro
   comando: caractere
Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
   count <- 0
   repita
       escreva("Digite um numero:")
       leia(num)
       count <- count + num
       escreva("deseja continua? [S/N]")
       leia(comando)
   ate (comando = "N") ou (comando = "n") ou (comando = "nao")
   escreva("A soma entre os numeros digitados sao: ",count)

Fimalgoritmo