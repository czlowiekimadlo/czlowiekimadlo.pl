<?php

class HomepageAction
{
    private $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    public function execute()
    {
        $content = $this->bag->template->render("base.html", [
            "CONTENT" => "Sempai!",
        ]);

        return new Response($content);
    }
}