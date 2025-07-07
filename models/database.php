<?php 

    class Database {
        private static $instance = null;

        public static function getConnection(){

            // Se não tiver uma instance irá criar uma
            if(!self::$instance){
                $host = "localhost";
                $db = "sistema_usuarios";
                $user = "root";
                $password = "";

                self::$instance = new PDO("mysql::host=$host;dbname=$db", $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        }
    }
?>