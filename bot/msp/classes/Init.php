<?php

namespace MSP;


class Init
{
    public static function run()
    {
        $input = new Input();

        $controller = new Manager($input);
        $controller->run();
    }
}