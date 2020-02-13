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

        $headers = $this->render("article/headers.fragment");
        $body = $this->render("article/body.fragment", [
            "CONTENT" => $formattedContent,
        ]);

        $content = $this->render("base.html", [
            "TITLE" => $article[Content::TITLE],
            "HEADERS" => $headers,
            "CONTENT" => $body,
        ]);

        return new Response($content);
    }
}