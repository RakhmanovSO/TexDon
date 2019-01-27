<?php

namespace utils;


class View{

    private $storage = [];

    public function __get($name){

        if(isset($this->storage[$name])){
            return $this->storage[$name];
        }//if

        return null;

    }//__get

    public function __set($name, $value){

        $this->storage[$name] = $value;

    }//__set

}