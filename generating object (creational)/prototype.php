<?php

class HeavyLoad{} 

class User{
    private $name;
    public function __construct(public HeavyLoad $load)
    {
        echo "construct \n \n";
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
}

class UserFactory{
    private User $user_prototype;

    public function create() : User{
        return clone $this->user_prototype ??= new User(new HeavyLoad());
    }
}

$user = new User(new HeavyLoad());
$user->setName("mama");
var_dump($user);
$user_2 = clone $user;
$user_2->setName("kok");
var_dump($user_2);



// clone အားသာချက်က constructor ကို မ run ဘူး