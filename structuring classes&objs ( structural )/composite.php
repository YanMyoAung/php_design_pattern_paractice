<?php 

abstract class Unit{
    public function addUnit(Unit $unit){
        throw new Exception(get_class($this) . ' is not a class');
    }

    public function removeUnit(Unit $unit){
        throw new Exception(get_class($this) . " is not a class");
    }

    abstract public function getBomberStrength(Unit $unit);
}

//leaf
class Archor extends Unit{
    public function getBomberStrength(Unit $unit)
    {
        return 4;
    }
}

//leaf
class Cannon extends Unit{
    public function getBomberStrength(Unit $unit)
    {
        return 40;
    }
}

//composite
class Army extends Unit{
    private array $unit = [];

    public function addUnit(Unit $unit)
    {
        if(in_array($unit,$this->unit,1)){
            return;
        }
        $this->unit[] = $unit;
    }

    public function removeUnit(Unit $unit)
    {
        $id = array_search($unit,$this->unit,1);
        if(is_int($id)){
            array_splice($this->unit,$id,1,[]);
        }
    }

    public function getBomberStrength(Unit $unit)
    {
        $ret = 0;
        foreach($this->unit as $unit){
            $ret += $unit->getBomberStrength();
        }
        return $ret;
    }
}

$archor = new Archor();
$cannon = new Cannon();
$army = new Army();
$army->addUnit($archor);
$army->addUnit($cannon);


$new_army = new Army();
$new_army->addUnit(new Archor());
$army->addUnit($new_army);

var_dump($army);