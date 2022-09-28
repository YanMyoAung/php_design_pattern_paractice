<?php
class Programmer{
    public int $hour = 0;
    public function __construct(public string $name,public string $age)
    {
        
    }

    public function eat(){
        $this->hour++;
        echo $this->name . " is eating. \n";
        return $this;
    }
    
    public function sleep(){
        $this->hour++;
        echo $this->name . " is sleeping. \n";
        return $this;
    }

    public function code(){
        $this->hour++;
        echo $this->name . " is coding. \n";
        return $this;
    }
    
}

$mgmg = new Programmer('mgmg', 30);
$mgmg->eat()->code()->sleep();
echo $mgmg->hour;
?>