<?php

abstract class abstractAction
{
    protected $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    abstract public function execute();

    protected function parse($markdown)
    {
        return $this->bag->parsedown->text($markdown);
    }

    protected function render($templateName, $blocks = [])
    {
        return $this->bag->template->render(
            $templateName,
            $blocks
        );
    }

    protected function cleanSlug($route)
    {
        return preg_replace("/[^a-z_0-9]/", "", $route);
    }

    protected function generate404()
    {
        $article = $this->bag->content->getGeneralContent("404");

        $content = $this->render("base.html", [
            "TITLE" => $article[Content::TITLE],
            "CONTENT" => $article[Content::CONTENT],
        ]);

        return new Response($content, 404);
    }
}