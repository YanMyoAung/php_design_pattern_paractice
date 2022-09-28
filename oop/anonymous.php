<?php
$name = 'mgmg';

$mgmg = function() use (&$name){
    $name = "kokodd" ;
    return $name;
};

//$name = "koko";
echo $mgmg() . "\n";
echo $name . "\n";


$getname = fn() => $name;
echo $getname();

$z = 1;
$fn = fn($x) => fn($y) => $x * $y + $z;
// Outputs 51
var_export($fn(5)(10));
?>