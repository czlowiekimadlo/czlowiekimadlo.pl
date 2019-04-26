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
        $request = $this->bag->request;

        $slug = $this->cleanSlug($request->route);

        $article = $this->bag->content->getArticle($slug);

        if ($article === null) {
            return $this->generate404();
        }

        $formattedContent = $this->bag->parsedown->text($article[Content::CONTENT]);

        $content = $this->bag->template->render("base.html", [
            "TITLE" => $article[Content::TITLE],
            "CONTENT" => $formattedContent,
        ]);

        return new Response($content);
    }

    private function cleanSlug($route)
    {
        return preg_replace("/[^a-z_0-9]/", "", $route);
    }

    private function generate404()
    {
        $article = $this->bag->content->getGeneralContent("404");

        $content = $this->bag->template->render("base.html", [
            "TITLE" => $article[Content::TITLE],
            "CONTENT" => $article[Content::CONTENT],
        ]);

        return new Response($content, 404);
    }
}