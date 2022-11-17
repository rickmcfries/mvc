<?php

class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->data = [];
        //echo "<p>New Main Controller<p>";
    }
    //funsion para cargar la vista del controlador
    function render(){
        $items =  $this->model->get();
        $this->view->data = $items;
        $this->view->render('main/index');
    }
    //funsion para obtener los elementos de la tabla que vamos a visualizar en la vista
    function getItem($param = null){
        $nameItem= $param[0];
        $item= $this->model->getByName($nameItem);//la funsion getByName contiene la logica para consultar los elementos de la tabla
        
        session_start();    //consulten para que sirve session
        $_SESSION['name_editItem']=$item->name;


        $this->view->item=$item;
        $this->view->message='';
        $this->view->render('main/edit');
    }
    //funsion para actualizar datos de un elemento de la tabla
    function updateItem(){
        session_start();
        $name=$_SESSION['name_editItem'];   //pueden investigar para que sirve session
        $description = $_POST['description'];
        $price = $_POST['price'];

        unset($_SESSION['name_editItem']);  //pueden investigar para que sirve session

        //se valida llama la funcion update, si retorna un true se realizo la acrualizacin
        if($this->model->update(['name'=>$name, 'description'=>$description, 'price'=>$price])){
            //INFORMACION UTILIZADA EN LA VISTA VIEW/MAIN/EDIT.PHP
            $item = new Item();
            $item->name = $name;
            $item->drescription = $description;
            $item->price = $price;

            $this->view->item = $item;
            $this->view->message = 'updated item';

        }else{  //si retorna un false no se pued hacer la actualizacion
            $this->view->message = 'cannot update item';
        }
        $this->view->render('main/edit');       //SE RECARGA NUEVAMENTE LA VISTA

    }
    //FUNSION DELETE
    function deleteItem($param = null){
        $nameItem= $param[0];//VALOR CORRESPONDIENTE A NAME
        
        if($this->model->delete($nameItem)){
            $this->view->message = 'item deleted';
        }else{
            $this->view->message = 'item could not be delete';
        }
        $this->render();
    }

}

?>