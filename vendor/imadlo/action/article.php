<?php

class ArticleAction
{
    private $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    public function execute()
    {
        $content = $this->bag->template->render("base.html", [
            "CONTENT" => $this->bag->request->route,
        ]);

        return new Response($content);
    }
}