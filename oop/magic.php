<?php

include('Juice.php');
use Test\Juice\Juice;

class Person{

    public string $txt = "demo";
    public function __construct(
        public string $name,public int $age
    )
    {
        $this->connect();
    }

    function __sleep()
    {
        return ['name'];
    }

    function __wakeup()
    {
        $this->connect();
    }

    function connect(){
        echo 'connect ' . "\n";
        $this->txt =  'ok' . "\n";
    }

    
}

Juice::AddWater();

$person = new Person('mgmg',3);
$s_person = serialize($person);
echo $s_person;
$u_person = unserialize($s_person);
echo $u_person->txt;

?>