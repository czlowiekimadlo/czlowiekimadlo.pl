<?php

class App {

    private $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    public function handleRequest()
    {
        $this->bag->router->routeRequest($this->bag->request);

        return $this->bag->request->action->execute();
    }
}
