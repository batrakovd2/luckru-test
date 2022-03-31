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

//        $controllerName = 'app\controllers\\'.$controllerName.'Controller';
//        $controllerFile = $controllerName.'.php';
//        $controllerPath = "app/controllers/".$controllerFile;
//        return $controllerName;
//        if(file_exists($controllerPath)) {
//            include "app/controllers/".$controllerFile;
//        } else {
//            Route::ErrorPage404();
//        }
//        print($controllerName);
        $controller = new PhonebookController();

        $action = $actionName;

        if(method_exists($controller, $action)) {
            $controller->index();
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