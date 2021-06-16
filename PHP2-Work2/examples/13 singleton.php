<?php
 class singleton {
    protected static $_instance; 

        private function __construct() {    
			echo "Единственный экземпляр класса создан!";
    }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;   
        }
 
        return self::$_instance;
    }
  
    private function __clone() {
    }

    private function __wakeup() {
    }     
}

//$obj = new someClass();
singleton::getInstance();
singleton::getInstance();
