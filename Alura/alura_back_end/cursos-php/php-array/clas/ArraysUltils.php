<?php declare(strict_types=1);
namespace alura\arrays\clas;

class ArraysUltils {
    public function remove($elemento, array &$array) {
        $position = array_search($elemento, $array, true);
        if (is_int($position)) {
            unset($array[$position]);
        }
    }
}