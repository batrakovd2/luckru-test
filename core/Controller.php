<?php

namespace app\core;

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {

    }

}