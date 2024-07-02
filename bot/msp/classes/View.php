<?php

namespace MSP;

use MSP;
use MSP\Pages;

class View
{
    public static function render($pageClass, $app, ...$rest)
    {
        if(class_exists($pageClass)){

            $page = new $pageClass($app, ...$rest);
            $page->render();

            die();
        }
    }
}