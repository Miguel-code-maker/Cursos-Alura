Algoritmo "triangolos"

Var
   l1,l2,l3: real
   eq, es, tri: logico

Inicio
      escreva("esvcreva o primeiro lado:")
      leia(l1)
      escreva("escreva o segundo lado:")
      leia(l2)
      escreva("escreva o terceiro lado:")
      leia(l3)
      tri <- (l1 < l2 + l3) e (l2 < l1 +l3) e (l3 < l1 + l2)
      eq <- (l2 = l2) e (l2 = l3)
      es <- (l1 <> l2) e(l2 <> 3) e (l1 <> l3)
      escreval("pode formar um triangolo?", tri)
      escreval("o triangolo e equilatero?", eq)
      escreva("o triangolo e escaleno?", es)

Fimalgoritmo