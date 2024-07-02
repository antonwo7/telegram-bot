<?php

namespace MSP\Pages;


class Test extends Page
{
    function __construct($app)
    {
        parent::__construct($app);

        $this->rememberPage();
    }

    protected function getData()
    {

    }

    public function render()
    {

    }
}