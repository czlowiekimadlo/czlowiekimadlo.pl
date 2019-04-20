<?php

class Request
{
    public $uri;
    public $route;
    public $action;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
    }
}
