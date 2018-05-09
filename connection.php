<?php
    class Db {
        private static $instance = NULL;
        
        private function __construct() {}
        
        private function __clone() {}
        
        public static function getInstance($user, $pass) {
            if (!isset(self::$instance)) {
                if(strtolower($user) != "t_super"){
                    $user = '"'.$user.'"';
                    $pass = '"'.$pass.'"';
                }
                
                self::$instance = oci_connect($user, $pass);
            }
            return self::$instance;
        }
    }
?>