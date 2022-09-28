<?php

abstract class Hello{
    abstract public function sayHello();
    
    public function sayName(){
        echo 'name';
    }

    final public function sayNo(){
        echo "no";
    }
}

class CO extends Hello{
    public function sayHello()
    {
        echo 'hello';
    }

}

$co = new CO();
