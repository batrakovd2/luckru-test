<?php

namespace app\core;

use app\controllers\PhonebookController;

class Route
{
    static function start()
    {
        $controllerName = 'Phonebook';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if ( !empty($routes[1]) ) {
            $controllerName = $routes[1];
        }

        if ( !empty($routes[2]) ) {
            $actionName = $routes[2];
        }
        $controllerFile = $controllerName.'Controller.php';
        $controllerPath = "app/controllers/".$controllerFile;
        $controllerName = '\app\controllers\\'.$controllerName.'Controller';

        if(!file_exists($controllerPath)) {
            Route::ErrorPage404();
        }
        $controller = new $controllerName;
        $action = $actionName;
        if(method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    private static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}