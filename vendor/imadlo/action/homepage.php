<?php

class HomepageAction extends abstractAction
{
    public function execute()
    {
        $blocks = $this->getBaseBlocks();
        $blocks["TITLE"] = "Czlowiekimadlo";
        $blocks["HEADERS"] = $this->render("homepage/headers.fragment");
        $blocks["CONTENT"] = $this->render("homepage/body.fragment");

        $content = $this->render("base.html", $blocks);

        return new Response($content);
    }
}