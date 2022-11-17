<?php

    include_once 'Model/item.php';

    class MainModel extends Model{

        public function __construct(){
            parent::__construct();
        }
        
        //funsion para obtener todos los datros de la tabla
        public function get(){
            $items= [];
            try{
                $query = $this->db->connect()->query("SELECT * FROM items");
                //creamos un arrar de objetos de la clase Item
                while($row = $query->fetch()){
                    $item = new Item();
                    $item->name        = $row['name'];
                    $item->description = $row['description'];
                    $item->price       = $row['price'];
                    
                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }

        //funcion para obtener los datos de un elemento mediante el campo de name, ustedes pueden modificarlo apra que sea por el id u otro campo
        public function getByName($name){
            $item= new Item();
            $query = $this->db->connect()->prepare(
                    'SELECT * FROM items WHERE name = :name');
            try {
                $query->execute(['name'=> $name]);

                //convertimos un array en un objeto

                while($row = $query->fetch()){
                    $item->name = $row['name'];
                    $item->description = $row['description'];
                    $item->price = $row['price'];
                }

                return $item;
            } catch (PDOException $e) {
               return null;
            }
        }
        //funcion para actualizar informacion de un elemento dee la tabla 
        public function update($item){
            $query = $this->db->connect()->prepare(
                'UPDATE items SET description = :description, price=:price WHERE name=:name');
            try {
                $query->execute([
                    'name'=>$item['name'],
                    'description'=>$item['description'],
                    'price'=>$item['price']
                ]);
                return true;
                
            } catch (PDOException $te) {
                return false;
            }
        }
        //funsion para eliminar elemento de la tabla
        public function delete($name){
            $query = $this->db->connect()->prepare(
                'DELETE FROM items WHERE name=:name');
            try {
                $query->execute([
                    'name'=>$name
                ]);
                return true;
                
            } catch (PDOException $te) {
                return false;
            }

        }
    }
?>