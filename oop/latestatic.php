<?php

class HelloO{
    public static string $name = "HELLO";

    public static function getName(){
        return static::$name;
    }
}

class GetHello extends HelloO{
    public static string $name = "MGMG";
}

echo GetHello::getName();