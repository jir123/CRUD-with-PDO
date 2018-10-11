<?php
    include 'config.php';

    class DataBase{
        private static $pdo;
        public function connection(){
            if(!isset(self::$pdo)){
                try{
                    self::$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER, DB_PASS);
                }catch(Exception $e){
                    echo $e->getMessage();
                }
            }
            return self::$pdo;
        }
        public static function prepareOwn($sql){
            return self::connection()->prepare($sql);
        }
    }
?>