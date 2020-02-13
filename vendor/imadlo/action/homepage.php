<?php

class HomepageAction extends abstractAction
{
    public function execute()
    {
        $headers = $this->render("homepage/headers.fragment");
        $body = $this->render("homepage/body.fragment");

        $content = $this->render("base.html", [
            "TITLE" => "Człowiekimadło",
            "HEADERS" => $headers,
            "CONTENT" => $body,
        ]);

        return new Response($content);
    }
}