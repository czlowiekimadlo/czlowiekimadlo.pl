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
        if ($route === "/" || $route === "") {
            return $this->bag->homepageAction;
        }

        if ($route === "/rss") {
            return $this->bag->rssAction;
        }

        return $this->bag->articleAction;
    }
}
