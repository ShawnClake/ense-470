<?php

// Create connection

require_once '/var/www/html/classes/config_reader.php';

final class DB
{
    public $conn = null;

    public static function Instance()
    {
        static $inst = null;
        if ($inst === null)
            $inst = new DB();
        return $inst;
    }

    private function __construct()
    {
        $config = config_reader::getEnv();


        $this->conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);
        if($this->conn->connect_error)
        {
        die("Connection failed: " . $this->conn->connect_error);
        }

    }


}

$APP_DB = DB::Instance();


