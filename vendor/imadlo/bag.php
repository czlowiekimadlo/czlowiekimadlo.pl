<?php

class Bag {

    public $parsedown;
    public $router;
    public $content;
    public $template;
    public $app;
    public $request;

    public $homepageAction;

    public function __construct()
    {
        $this->parsedown = new Parsedown();
        $this->request = new Request();
        $this->router = new Router($this);
        $this->content = new Content();
        $this->template = new Template();
        $this->app = new App($this);

        $this->homepageAction = new HomepageAction($this);
    }
}
