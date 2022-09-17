<?php 

class DB{
    private static $db_instance;

    private function __construct()
    {
        echo "Constructed \n";
    }
    
    public static function getInstance(){
        if(!self::$db_instance instanceof DB){
            self::$db_instance = new DB();
        }
        return self::$db_instance;
    }

    public function connect(){
        return "DB Connected! \n";
    }

    public function connectDone(){
        return "DB Connected Done! \n";
    }

}

$mysql = DB::getInstance();
echo $mysql->connect();

$mysql = DB::getInstance();
echo $mysql->connectDone();
