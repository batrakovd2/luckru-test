<?php

namespace app\core;

class View
{
    public $app = "app.php";

    public function render($template)
    {
        include 'app/views/'.$this->app;
    }

}