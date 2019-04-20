<?php

class App {

    private $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    public function handleRequest()
    {
        var_dump($this->bag->request);
    }
}
