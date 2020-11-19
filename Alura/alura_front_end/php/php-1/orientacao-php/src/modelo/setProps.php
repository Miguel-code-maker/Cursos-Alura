<?php


namespace alura\banco\modelo;


trait setProps {
    public function __set($name, string $value): void {
        $nameSet = 'set'. ucfirst($name);
        $this->$nameSet($value);
    }
}