<?php

class Router {

    private $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    public function getActionForRequest(Request $request)
    {

    }
}
