<?php
    class View{
        function __construct(){
          //  echo 'base view';
        }
        function render($view){
            require_once 'View/index.php';
            //require_once "View/$view.php";
        }
    }

?>