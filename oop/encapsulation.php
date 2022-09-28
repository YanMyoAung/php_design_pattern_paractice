<?php
class Person{
    private $id;
    public $data = array();
    public function __construct(
        public string $name,private string $age)
    {}

    function getName(){
        return $this->name;
    }

    function getAge(){
        return $this->age;
    }

    //encapsulation
    function setID($id){
        $this->id = $id;
    }

    function getID(){
        return $this->id;
    }

    //magic method 
    function __set($key,$val){
        $this->data[$key] = $val;
    }

    function __get($key){
        return isset($this->data[$key]) ? $this->data[$key] : "no data";
    }

    function __call($name, $arguments)
    {
        var_dump($name);
        var_dump($arguments);
    }

    function __toString()
    {
        return __CLASS__ . $this->name;
    }
}

$person1 = new Person('mg',3);
$p1 = serialize($person1);
echo $p1;



// $person1->skincolor = 'black';
// // echo $person1->skincolor;
// // echo $person1->hot;
// $person1->run("fast");
?>