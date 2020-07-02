<?php

class ArticleAction extends abstractAction
{
    public function execute()
    {
        $slug = $this->cleanSlug($this->bag->request->route);
        $article = $this->bag->content->getArticle($slug);

        if ($article === null) {
            return $this->generate404();
        }
        $formattedContent = $this->parse($article[Content::CONTENT]);

        $blocks = $this->getBaseBlocks();
        $blocks["TITLE"] = $article[Content::TITLE];
        $blocks["HEADERS"] = $this->render("article/headers.fragment");
        $blocks["CONTENT"] = $this->render("article/body.fragment", [
            "TITLE" => $article[Content::TITLE],
            "CONTENT" => $formattedContent,
        ]);

        $content = $this->render("base.html", $blocks);

        return new Response($content);
    }
}