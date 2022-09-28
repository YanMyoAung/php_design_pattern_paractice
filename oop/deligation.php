<?php
declare(strict_types=1);
interface BossInterface{
    public function scold();
}

interface GMInterface{
    function giveMoney();
}

interface ManagerInterface{
    function manage();
}

class Boss implements BossInterface{
    function scold(){
        return 'scold';
    }
}

class GM implements GMInterface{
    function giveMoney()
    {
        return 'give money';
    }
}

class Manager implements ManagerInterface{

    function __construct(public object $boss,public object $gm)
    {
        
    }
    function manage()
    {
        return 'Manage';
    }
}

$manager = new Manager(new Boss(),new GM());
echo $manager->manage() . "\n";
echo $manager->boss->scold() . "\n";
echo $manager->gm->giveMoney() . "\n";
?>