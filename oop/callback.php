<?php

class Product
{
    public function __construct(public string $name, public float $price)
    {
    }
}

class Sale
{
    public object $log;
    public object $save;

    public function __construct()
    {
        $this->log = fn($product) => print "Logging : $product->name \n";  
        $this->save = function ($product) {
            echo "Saving :$product->name \n";
        };
    }

    public function saleProcess(Product $product)
    {
        print "{$product->name}: processing \n";
        call_user_func($this->log, $product);
        call_user_func($this->save, $product);
        $callable = Closure::fromCallable('sayHello');
        
    }

    function sayHello(){
        print "HELLO";
    }

}

$sale = new Sale();
$sale->saleProcess(new Product("banana", 40));
