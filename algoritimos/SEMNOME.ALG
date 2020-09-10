Algoritmo "semnome"
Var
   ano, maio, naceu, idade, mes1, mes2, remes: inteiro


Inicio
      escreva("em que ano estamos? ")
      leia(ano)
      escreva("em que mes estamos?")
      leia(mes1)
      escreva("digita o ano que vc naceu? ")
      leia(naceu)
      escreva("em que mes vc naceu?")
      leia(mes2)
      idade <- ano - naceu
      se (mes1 < mes2) entao
         idade <- idade - 1
      fimse
      escreval("a sua idade e", idade)
      se (idade >= 18) entao
         escreval("voce e maior de idade")
      senao
           escreval("vc e menor de idade ")
           maio <- 18 - idade
           escreva("em", maio, " anos vc terar 18 anos e sera meaior de idade")
      fimse


Fimalgoritmo