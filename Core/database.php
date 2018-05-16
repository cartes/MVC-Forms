<?php
namespace Core;
defined("APPPATH") or die("Acceso Restringido");

use \Core\app;

class database {
    //Atributos
    private $_dbUser;
    private $_dbPass;
    private $_dbHost;
    private $_dbName;
    private $_conn;
    private static $_instance;
        
    // Metodos        
    function __construct() {
        try {
            $config = app::getConfig();
            $this->_dbHost = $config["host"];
            $this->_dbUser = $config["user"];
            $this->_dbPass = $config["password"];
            $this->_dbName = $config["database"];

            $this->_conn = new \PDO('mysql:host='.$this->_dbHost . ';dbname='.$this->_dbName, $this->_dbUser, $this->_dbPass);
            $this->_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->_conn->exec("SET CHARACTER SET utf8");
            
        } catch (\PDOException $e) {
            print "Error: " . $e->getMessage();
            die();
        }
    }
    
    public function prepare($sql) {
        return $this->_conn->prepare($sql);
    }
    
    public static function instance() {
        if (!isset(self::$_instance)) {
            $class = __CLASS__;
            self::$_instance = new $class;
        }
        return self::$_instance;
    }
    
    public function lastId() {
        $id = $this->_conn->lastInsertId();
        return $id;
    }
    
    public function __clone() {
        trigger_error("La clonación de este objeto no está permitida", E_USER_ERROR);
    }
}
?>