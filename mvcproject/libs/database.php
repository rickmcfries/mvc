<?php
    class Database{
        private $host;
        private $db;
        private $user;
        private $password;
        //private $charset;

        public function __construct(){
            $this->host = constant('HOST');
            $this->db = constant('DB');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            //$this->charset = constant('CHARSET');
        }

        function connect(){
            try{
                $connection = "mysql:host=$this->host; dbname=$this->db";
                $pdo = new PDO($connection, $this->user, $this->password);
                //echo "Connected to $this->db at $this->host successfully.";
                return $pdo;

            }catch(PDOException $e){
                print_r('Error connection: '.$e->getMessage());
            }
        }
    }
?>