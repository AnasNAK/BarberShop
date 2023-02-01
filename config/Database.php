<?php
    class Database{
        //DB params
        private $host = 'localhost:3307';
        private $db_name = 'barbershop';
        private $username = 'root';
        private $password = '';
        private $con;

        //db connect
        public function connect(){
            $this->con = null;

            try{
                $this->con = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo 'Connection Error : ' . $e->getMessage();
            }
            return $this->con; 
        }
    }