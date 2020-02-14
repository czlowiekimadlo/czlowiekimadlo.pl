<?php

class ErrorAction extends abstractAction
{
    public function execute()
    {
        return $this->executeCode(404);
    }

    public function executeCode($httpCode)
    {
        $content = "";
        $article = $this->bag->content->getGeneralContent((string) $httpCode);

        $formattedContent = $this->parse($article[Content::CONTENT]);

        if ($article !== null) {
            $content = $this->render("error.html", [
                "TITLE" => $article[Content::TITLE],
                "CONTENT" => $formattedContent,
            ]);
        }

        return new Response($content, $httpCode);
    }
}