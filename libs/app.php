<?php
    require_once 'Controllers/error.php';
    class App{
        function __construct(){
            //formateamos la url como un array y divimos las palabras con el simbolo /
            
            $url = isset($_GET['url']) ? $_GET['url'] : null; // si la url esta vacia se asigna el valor de null
            $url = rtrim($url, '/');
            $url = explode('/', $url);
             
            //validamos un controlador por default, en este caso main
            if(empty($url[0])){
                $pathController = 'Controllers/Main.php';
                require_once $pathController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }

            //si existe una un valor en la url para un controlador se carga la ruta y se valida si existe
            $pathController = 'Controllers/'.$url[0].'.php';
            
            if(file_exists($pathController)){
                require_once $pathController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                $nparam= sizeof($url);

                //si existe un controlador, con el parametro se determina si se ejecuta un metodo
                if($nparam>1){
                    if($nparam>2){
                        //si se ejecuta un metodo se pasan los parametros para el metodo, es decir si se va a eliminar o actualizar mandamos el name
                        $param = [];
                        for ($i=2; $i<$nparam ; $i++) { 
                            array_push($param, $url[$i]);   //se crea un array con los valores para ejecutar el metodo
                        }
                        $controller -> {$url[1]}($param);   //se ejecuta el metodo con los parametros 
                    }else{
                        $controller -> {$url[1]}();
                    }
                }else{
                    $controller->render();  //si no se ocupo ejecutar un metodo carga la vista
                }
            }else{
                $controller = new ErrorController(); //si no existe el controlador ingresado en la url marca un mensaje de error
            }
        }
    }
?>
