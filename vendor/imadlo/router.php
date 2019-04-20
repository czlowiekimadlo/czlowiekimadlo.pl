<?php

class Router {

    private $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    public function routeRequest(Request $request)
    {
        $route = $this->processUri($request->uri);
        $request->route = $route;
        $request->action = $this->pickAction($route);
    }

    private function processUri($uri)
    {
        return preg_replace('/^.*\.php/', '', $uri);
    }

    private function pickAction($route)
    {
        if ($route === "/") {
            return $this->bag->homepageAction;
        }

        return $this->bag->articleAction;
    }
}
