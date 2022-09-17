<?php 

interface FoodItem{
    public function cost();
}

class Burger implements FoodItem{
    public function cost()
    {
        return 5;
    }
}

class Cheese implements FoodItem{
    public function __construct(public FoodItem $fooditem)
    {
        
    }

    public function cost()
    {
        return $this->fooditem->cost() + 1;
    }
}

class Patty implements FoodItem{
    public function __construct(public FoodItem $fooditem)
    {
        
    }

    public function cost()
    {
        return $this->fooditem->cost() + 2;
    }
}

$burger = new Burger();
$burger_cheese = new Cheese($burger);
$burger_patty = new Patty($burger_cheese);
echo $burger_patty->cost();

?>