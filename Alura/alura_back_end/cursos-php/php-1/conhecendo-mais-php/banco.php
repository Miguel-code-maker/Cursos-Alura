<?php
// formas de inporta um arquivo.
// include 'nomedoarquivo'; // so importa mesmo.
// require 'nomedoarquivo'; // importa mas fala que o programa não roda sem ele.
// require_once // mesma coisa que o require mas esse so importa se não estiver importado ele é o melhor.
require_once './contas.php';

if (!empty($contas)) {
    sacar($contas[79834590], 800);
    depositar($contas[79834590], 1000);
    toUpperNome($contas[79834590]);
//     ele tira a variavel ou iten da lista e pode receber dois para metros ao mesmo tempo
//    unset($contas[64567867]);
//    print_r($contas);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-family: "Noto Sans", sans-serif;
        }
        h1 {
            text-align: center;
        }

        dl {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            justify-items: center;
            align-items: center;
        }

        .conta {
            font-size: 18pt;
            margin: 10px;
        }
        .conta__dados {
            font-size: 14pt;
            margin-left: -10px;
        }
    </style>
    <title>PHP conta corrente</title>
</head>
<body>
    <h1>Conta corrente</h1>
    <dl>
        <?php foreach ($contas as $cpf => $conta) { ?>
        <dt class="conta">
            <?= "$conta[titula] cpf-";?> <?= "$cpf"?>
        </dt>
        <dd class="conta__dados">
            <?= "Saldo: $conta[saldo]"?>
        </dd>
        <?php }  ?>
    </dl>
</body>
</html>
<?php
/* usar: <?php echo ""; ?> é a mesma coisa que usar isso: <?= "";?>*/

?>
