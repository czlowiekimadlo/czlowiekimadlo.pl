<?php

class Content {

    const TITLE = "title";
    const CONTENT = "content";

    public function getArticle($slug)
    {
        $fileContent = $this->getFileBySlug($slug);

        if ($fileContent === false) {
            return null;
        }

        return [
            self::TITLE => strstr($fileContent, "\n", true),
            self::CONTENT => strstr($fileContent, "\n"),
        ];
    }

    public function getGeneralContent($slug)
    {
        $fileContent = $this->getGeneralFileBySlug($slug);

        if ($fileContent === false) {
            return null;
        }

        return [
            self::TITLE => strstr($fileContent, "\n", true),
            self::CONTENT => strstr($fileContent, "\n"),
        ];
    }

    public function getGeneralContentRaw($file)
    {
        $filename = "../content/$file";

        if (file_exists($filename)) {
            return file_get_contents($filename);
        }

        return false;
    }

    private function getFileBySlug($slug)
    {
        return $this->getGeneralFileBySlug("articles/" . $slug);
    }

    private function getGeneralFileBySlug($slug)
    {
        $filename = "$slug.md";

        return $this->getGeneralContentRaw($filename);
    }
}
