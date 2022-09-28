<?php

namespace Test\Juice;

class Juice{
    public static $_instance;
    public static function AddWater(){
        if(!self::$_instance instanceof Juice){
            self::$_instance = new Juice();
        }
        echo "Add Water \n";
        return self::$_instance;
    }

    public function addSugar(){
        echo "Add Sugar \n";
        return $this;
    }

    public function addOrange(){
        echo "Add Orange \n";
        return $this;
    }
    
    public function shake(){
        echo "Shake";
    }

}


?>