Algoritmo "game"
// 
//  
// Descrição   : Aqui você descreve o que o programa faz! (função)
// Autor(a)    : Nome do(a) aluno(a)
// Data atual  : 12/9/2020
Var
// Seção de Declarações das variáveis 
   v: vetor[1..9] de caractere
   m: vetor[1..3,1..3] de caractere
   x, o, i, l, c, count, count1, count2, count3: inteiro
   gameover, sf: logico
   play: inteiro
   procedimento game (position1, position2: inteiro)
   inicio
   se (position1 <> 365 ) e (position2 = 365 ) e (position1 <= 9) e (position1 >= 1)  entao
       se (v[position1] <> "X") e (v[position1] <> "O") entao
           v[position1] <- "X"
           play <- 2
           table()
       senao
           escreval("opçao invalida")
           escreval(" ")
           play <- 1
           table()
       fimse
   senao
       se (position2 <> 365 ) e (position1 = 365 ) e (position2 <= 9) entao
           se (v[position2] <> "O") e (v[position2] <> "X") entao
               v[position2] <- "O"
               play <- 1
               table()
           senao
               escreval("opçao invalida")
               escreval(" ")
               play <- 2
               table()
           fimse
       senao
           escreval("opçao invalida")
           escreval(" ")
           table()
       fimse
   fimse
   fimprocedimento

   procedimento table ()
   inicio
   para i <- 1 ate 3 passo 1 faca
       escreva("| ", v[i])
   fimpara
   escreval("|")
   para i <- 4 ate 6 passo 1 faca
       escreva("| ", v[i])
   fimpara
   escreval("|")
   para i <- 7 ate 9 passo 1 faca
       escreva("| ", v[i])
   fimpara
   escreval("|")
   escreval(" ")
   fimprocedimento



   procedimento acabou(qj: caractere)
   inicio
   sf <- falso
   count1 <- 0
   count2 <- 0
   count3 <- 0
   para l <- 1 ate 3 faca
       para c <- 1 ate 3 faca
           se (l = 3) entao
               m[l,c] <- v[c+6]
           senao
               se (l = 2) entao
                   m[l,c] <- v[c+3]
               senao
                   m[l,c] <- v[c]
               fimse
           fimse
       fimpara
   fimpara
   para l <- 1 ate 3 faca
       para c <- 1 ate 3 faca
           se (l = 1) entao
               se (m[l,c] = qj)entao
                   count1 <- count1 + 1
               fimse
           senao
               se (l = 2) entao
                   se (m[l,c] = qj)entao
                       count2 <- count2 + 1
                   fimse
               senao
                   se (m[l,c] = qj)entao
                       count3 <- count3 + 1
                   fimse
               fimse
               se (count1 = 3) ou (count2 = 3) ou (count3 = 3) entao
                   sf <- verdadeiro
               fimse
           fimse
       fimpara
   fimpara
   count1 <- 0
   count2 <- 0
   count3 <- 0
   para l <- 1 ate 3 faca
       para c <- 1 ate 3 faca
           se (l = 1) entao
               se (m[c,l] = qj) entao
                   count1 <- count1 + 1
               fimse
           senao
               se (l = 2) entao
                   se (m[c,l] = qj) entao
                       count2 <- count2 + 1
                   fimse
               senao
                   se (m[c,l] = qj) entao
                       count3 <- count3 + 1
                   fimse
               fimse
               se (count1 = 3) ou (count2 = 3) ou (count3 = 3) entao
                   sf <- verdadeiro
               fimse
           fimse
       fimpara
   fimpara
   se (m[1,1] = qj) e (m[2,2] = qj) e (m[1,3] = qj) entao
       sf <- verdadeiro
   senao
       se (m[1,3] = qj) e (m[2,2] = qj) e (m[3,1] = qj) entao
           sf <- verdadeiro
       fimse
   fimse
   count <- 0
   para i <- 1 ate 9 faca
       se (v[i] = "X") ou (v[i] = "O") entao
           count <- count + 1
       fimse
   fimpara
   se (count = 9) entao
           sf <- verdadeiro
   fimse
   se (sf = verdadeiro)entao
       gameover <- verdadeiro
   fimse
   fimprocedimento
Inicio
// Seção de Comandos, procedimento, funções, operadores, etc... 
   v[1] <- "1"
   v[2] <- "2"
   v[3] <- "3"
   v[4] <- "4"
   v[5] <- "5"
   v[6] <- "6"
   v[7] <- "7"
   v[8] <- "8"
   v[9] <- "9"
   gameover <- falso
   table()

   repita
       se (play = 1) entao
          escreva("Qual posiçao vc deseja marca o [X]: ")
          leia(x)
          game(x, 365)
          acabou("X")
       senao
          escreva("Qual posiçao vc deseja marca o [O]: ")
          leia(o)
          game(365, o)
          acabou("O")
       fimse
   ate (gameover = verdadeiro)
   escreva("fim de jogo")
Fimalgoritmo
