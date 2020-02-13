<?php

class Request
{
    public $uri;
    public $path;
    public $route;
    public $action;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->path = $_SERVER['PATH_INFO'];
    }
}
