<?php

class Bag {

    public $parsedown;
    public $router;
    public $content;
    public $app;

    public function __construct()
    {
        $this->parsedown = new Parsedown();
        $this->router = new Router();
        $this->content = new Content();
        $this->app = new App();
    }
}
