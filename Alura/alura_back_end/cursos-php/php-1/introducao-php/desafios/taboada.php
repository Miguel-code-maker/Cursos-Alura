<?php
echo "Toda a taboada\n";
$num1 = 1;
$num2 = 10;

for ($num1 = 1; $num1 <= 10; $num1++) {
    for ($num2 = 1; $num2 <=10; $num2++) {
        echo "$num1 X $num2 = ".$num1*$num2.PHP_EOL;
    }
    echo PHP_EOL;
}
echo "uma taboada especifica\n";
$mult = 5;
for ($i = 1; $i <= 10; $i++) {
    echo "$mult X $i = ".$mult*$i.PHP_EOL;
}