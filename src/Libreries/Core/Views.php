<?php

class Views
{
    function getView($controller, $view, $data = "")
    {
        $controller = get_class($controller);
        $controller = str_replace('Controller', '', $controller);
        //echo $controller;
        if ($controller == "Home") {
            $view = 'Views/' . $view . ".php";
        } else {
            $view = 'Views/' . $controller . "/" . $view . ".php";
            //echo $view;
        }
        require_once($view);
    }
}
