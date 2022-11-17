<?php

    class addModel extends Model{

        public function __construct(){
            parent::__construct();
        }
        
        public function insert($data){
            try{
                $query = $this->db->connect()->prepare
                ('INSERT INTO items (name, description, price) VALUES(:name, :description, :price)');
                $query->execute(['name' => $data['name'],'description' => $data['description'], 'price' => $data['price']]);
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>