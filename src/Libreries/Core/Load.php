<?php
$controller = ucwords($controller);
//echo $controller;
$controllerFile = "app/Controllers/".$controller."Controller.php";
if(file_exists($controllerFile)){ 
    require_once($controllerFile);
    $controller = new $controller;
    if(method_exists($controller, $method)){
        $controller->{$method}($params);
    }else{
        require_once("app/Controllers/ErrorController.php");
    }
}else{
    require_once("app/Controllers/ErrorController.php");
}