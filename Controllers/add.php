<?php

class Add extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->message="";
        //echo "<p>New Main Controller<p>";
    }

    function render(){
        $this->view->render('add/index');
    }
    
    function newItem(){
        //echo 'successful new item';
        $dataNewItem['name'] = $_POST['name'];
        $dataNewItem['description'] = $_POST['description'];
        $dataNewItem['price'] = $_POST['price'];

        if($this->model->insert($dataNewItem)){
            $this->view->message = 'new item created';
        }else{
            $this->view->message = 'error adding item';
        }
        $this->render();

    }
}

?>