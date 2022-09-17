<?php 

interface Observer{
    public function update(Observerable $observeable);
}

interface Observerable{
    public function attach(Observer $observer) : void;
    public function detach(Observer $observer) : void;
    public function notify() : void;
}

class Newspaper implements Observerable{

    private $observers = [];
    private $content;

    public function __construct(private string $name)
    {
        
    }

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        $key = array_search($observer,$this->observers,true);
        if(isset($key)){
            unset($this->observers[$key]);
        }
    }

    public function notify(): void
    {
        foreach($this->observers as $observer){
            $observer->update($this);
        }
    }

    public function breakOutNews($content){
        $this->content = $content;
        $this->notify();
    }

    public function getContent() {
        return $this->content." ({$this->name})";
    }
}

class Reader implements Observer{

    public function __construct(private string $name)
    {
        
    }
    public function update(Observerable $observeable)
    {
        //echo "$this->name is reading breaking news " . $observeable->getContent() . "\n";
    }
}

$newspaper = new Newspaper("Times");

$tommy = new Reader("Tommy");
$nancy = new Reader("Nancy");
$joden = new Reader("Joden");

$newspaper->attach($tommy);
$newspaper->attach($nancy);
$newspaper->attach($joden);

var_dump($newspaper);
$newspaper->detach($joden);


$newspaper->breakOutNews("HOLY SHEET");



?>