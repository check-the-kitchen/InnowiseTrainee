<?php

namespace Core;

class Router
{
    public static function start():void{

        $controllerName="UserController";
        $actionName="main";
        $uriArgsArray=explode("/", $_SERVER["REQUEST_URI"]);
        var_dump($uriArgsArray);

        if (!empty($uriArgsArray[2])){
            $controllerName=$uriArgsArray[2]."Controller";
        }
        if (!empty($uriArgsArray[3])){
            $actionName=$uriArgsArray[3]."Action";
        }
        $controllerPath="Aplication/Controller/".$controllerName.".php";
        echo $controllerPath;
        if(file_exists($controllerPath)){
            require_once $controllerPath;
            $controller= new $controllerName();
            echo "today was a good day";
        }
        else{
            echo "not found";
        }





    }
}