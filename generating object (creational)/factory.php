<?php

class MySQLConn
{

    public function __construct()
    {
        echo "MySQL Database Connection" . PHP_EOL;
    }

    public function select()
    {
        echo "Your mysql select query execute here" . PHP_EOL;
    }
}

class OracleConn
{

    public function __construct()
    {
        echo "Oracle Database Connection" . PHP_EOL;
    }

    public function select()
    {
        echo "Your oracle select query execute here" . PHP_EOL;
    }
}

class DBFactory
{
    const MYSQL = 'mysql';
    const ORACLE = 'oracle';
    public static function connect($data)
    {
        switch ($data) {
            case self::MYSQL :
                $instance = new MySQLConn();
                break;
            case self::ORACLE :
                $instance = new OracleConn();
                break;
            default:
                $instance = new MySQLConn();
                break;
        }
        return $instance;
    }
}

$db_conn = DBFactory::connect(DBFactory::MYSQL);
$db_conn->select();
