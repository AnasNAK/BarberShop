<?php
    class Costumer{
        private $con;
        private $table = 'costumer';

        public $id;
        public $first_name;
        public $last_name;
        public $phone;
        public $unique_id;

            public function __construct($db){
                $this->con = $db;
            }

            public function read(){
                $query ='SELECT * from ' . $this->table. '';

                $stmt = $this->con->prepare($query);

                $stmt->execute();

                return $stmt;
            }


            public function create(){
                $query ='INSERT INTO ' . $this->table . '
                SET 
                first_name = :first_name, 
                last_name = :last_name, 
                phone = :phone';

                $stmt = $this->con->prepare($query);
                
                $this->first_name = htmlspecialchars(strip_tags($this->first_name));
                $this->last_name = htmlspecialchars(strip_tags($this->last_name));
                $this->phone = htmlspecialchars(strip_tags($this->phone));

                $stmt->bindParam(':first_name', $this->first_name);
                $stmt->bindParam(':last_name', $this->last_name);
                $stmt->bindParam(':phone', $this->phone);

                if($stmt->execute()){
                    return true;
                }
                    printf("Error: %s.\n", $stmt->error);
                    return false;
            }

            public function update(){
                $query ='UPDATE ' . $this->table . '
                SET 
                first_name = :first_name, 
                last_name = :last_name, 
                phone = :phone
                WHERE
                id = :id';
    
                $stmt = $this->con->prepare($query);
                
                $this->first_name = htmlspecialchars(strip_tags($this->first_name));
                $this->last_name = htmlspecialchars(strip_tags($this->last_name));
                $this->phone = htmlspecialchars(strip_tags($this->phone));
                $this->id = htmlspecialchars(strip_tags($this->id));
    
                $stmt->bindParam(':first_name', $this->first_name);
                $stmt->bindParam(':last_name', $this->last_name);
                $stmt->bindParam(':phone', $this->phone);
                $stmt->bindParam(':id', $this->id);
    
                if($stmt->execute()){
                    return true;
                }
                    printf("Error: %s.\n", $stmt->error);
                    return false;
            }


            public function delete(){
                $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

                $stmt = $this->con->prepare($query);

                $this->id = htmlspecialchars(strip_tags($this->id));

                $stmt->bindParam(':id', $this->id);

                if($stmt->execute()){
                    return true;
                }
                    printf("Error: %s.\n", $stmt->error);
                    return false;
            }
                

        }