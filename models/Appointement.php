<?php
    class Appointement{
        private $con;
        private $table = 'appointement';

        public $id;
        public $created_at;
        public $ends_at;
        public $costumer_id;

            public function __construct($db){
                $this->con = $db;
            }

            public function read(){
                $query ='SELECT * from ' . $this->table. '';

                $stmt = $this->con->prepare($query);

                $stmt->execute();

                return $stmt;
            }

            // public function read_single(){
            //     $query ='SELECT 
            //             c.first_name as costumer_first_name,
            //             a.id,
            //             a.costumer_id,
            //             a.created_at,
            //             a.ends_at
            //             FROM 
            //             ' . $this->table . ' a 
            //             LEFT JOIN 
            //             costumer c ON a.costumer_id = c.id
            //             WHERE
            //             p.id = ?
            //             LIMIT 0,1';

            //             $stmt = $this->con->prepare($query);

            //             $stmt->bindParam(1, $this->id);

            //             $stmt->execute();

            //             $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //             $this->costumer_id = $row['costumer_id'];
            //             $this->created_at = $row['created_at'];
            //             $this->ends_at = $row['ends_at'];
            // }

            public function create(){
                $query ='INSERT INTO ' . $this->table . '
                SET 
                costumer_id = :costumer_id, 
                created_at = :created_at, 
                ends_at = :ends_at';

                $stmt = $this->con->prepare($query);
                
                $this->costumer_id = htmlspecialchars(strip_tags($this->costumer_id));
                $this->created_at = htmlspecialchars(strip_tags($this->created_at));
                $this->ends_at = htmlspecialchars(strip_tags($this->ends_at));

                $stmt->bindParam(':costumer_id', $this->costumer_id);
                $stmt->bindParam(':created_at', $this->created_at);
                $stmt->bindParam(':ends_at', $this->ends_at);

                if($stmt->execute()){
                    return true;
                }
                    printf("Error: %s.\n", $stmt->error);
                    return false;
            }

            public function update(){
                $query ='UPDATE ' . $this->table . '
                SET 
                costumer_id = :costumer_id, 
                created_at = :created_at, 
                ends_at = :ends_at
                WHERE
                id = :id';
    
                $stmt = $this->con->prepare($query);
                
                $this->costumer_id = htmlspecialchars(strip_tags($this->costumer_id));
                $this->created_at = htmlspecialchars(strip_tags($this->created_at));
                $this->ends_at = htmlspecialchars(strip_tags($this->ends_at));
                $this->id = htmlspecialchars(strip_tags($this->id));
    
                $stmt->bindParam(':costumer_id', $this->costumer_id);
                $stmt->bindParam(':created_at', $this->created_at);
                $stmt->bindParam(':ends_at', $this->ends_at);
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