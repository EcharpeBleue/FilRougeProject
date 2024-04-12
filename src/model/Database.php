<?php
namespace app\guild\model;

class Database
{
    private static ?Database $_instance=null;
    private ?\PDO $_connexion = null;

    private function __construct()
    {
        $this->_connexion = new \PDO('mysql:host=mysql-server;dbname=GuildeDB', 'db_user', 'password');
    }

    public static function getInstance()
    {
        if (self::$_instance ==null)
            self::$_instance = new Database();
      
            return self::$_instance;
    }
    public function getConnexion():\PDO
    {
        return $this->_connexion;
    }

}