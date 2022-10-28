<?php


class Router
{
    public static function start(): void
    {

        $controllerName = "UserController";
        $actionName = "mainAction";

        $uriArgsArray = explode("/", $_SERVER["REQUEST_URI"]);
        if (!empty($uriArgsArray[2])) {
            $controllerName = $uriArgsArray[2] . "Controller";
        }
        if (!empty($uriArgsArray[3])) {
            $actionName = $uriArgsArray[3] . "Action";
        }
        $controllerPath = "Application/Controller/" . $controllerName . ".php";

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $controllerName();
            if (method_exists($controller, $actionName)) {
                $controller->$actionName();
            } else {
                require_once 'Application/View/errorsTemplate/404NotFound.php';
            }
        } else {
            require_once 'Application/View/errorsTemplate/404NotFound.php';
        }


    }
}