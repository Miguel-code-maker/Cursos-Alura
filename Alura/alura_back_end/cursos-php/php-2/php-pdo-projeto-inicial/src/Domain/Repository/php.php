<?php 
$valor = 3;




//dentro de foreach
	$optionList = []
	$option = '<options value="{$valor}"></options>'
	foreach ($optionList as $options) {
		if ($options != $options) {
			$optionFinal = $option;
		} else {
			$optionFinal = '';
		}
	}
	$optionList[] = $option;
	echo $option;
?>