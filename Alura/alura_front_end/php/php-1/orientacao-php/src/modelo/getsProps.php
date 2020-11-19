<?php


namespace alura\banco\modelo;


trait getsProps {
    public function __get($name): string {
        $nameGet = "get" . ucfirst($name);
        return $this->$nameGet();
    }

}