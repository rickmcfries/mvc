<?php

class Delete extends Controller{
    function __construct(){
        parent::__construct();
    
    }

    function render(){
        $this->view->render('delete/index');
    }
}

?>