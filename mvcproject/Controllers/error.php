<?php
class ErrorController extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('error');
        //echo "<p>Error al cargar recurso<p>";
    } 
}

?>