<?php

class View
{
    public function render($template_view)
    {
        include 'app/views/'.$template_view;
    }

}