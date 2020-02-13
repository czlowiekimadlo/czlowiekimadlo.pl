<?php

class Template
{
    public function render($template, array $blocks)
    {
        $templateCode = file_get_contents("../vendor/imadlo/templates/" . $template);

        return $this->applyBlocks($templateCode, $blocks);
    }

    public function applyBlocks($templateCode, array $blocks)
    {
        foreach ($blocks as $blockName => $blockContent) {
            $templateCode = str_replace("{{" . $blockName . "}}", $blockContent, $templateCode);
        }

        //clear out any outstanding tags
        $templateCode = preg_replace("/{{[A-Z]*}}/", "", $templateCode);

        return $templateCode;
    }
}
