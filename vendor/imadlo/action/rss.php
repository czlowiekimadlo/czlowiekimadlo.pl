<?php

class RssAction extends abstractAction
{
    const RSS_FEED_FILE = "rss.json";

    public function execute()
    {
        $blocks = [
            "TITLE" => "",
            "LINK" => "",
            "DESCRIPTION" => "",
            "ITEMS" => "",
        ];

        $headers = [
            "Content-Type" => "application/rss+xml"
        ];


        $feed = $this->bag->content->getGeneralContentRaw(self::RSS_FEED_FILE);
        if ($feed !== false) {
            $feed = json_decode($feed, true);

            $blocks["TITLE"] = $feed["title"];
            $blocks["LINK"] = $feed["link"];
            $blocks["DESCRIPTION"] = $feed["description"];

            $items = "";
            foreach ($feed['items'] as $item) {
                $items .= $this->render("rss/item.xml", [
                    "TITLE" => $item["title"],
                    "LINK" => $feed["link"] . $item["link"],
                    "GUID" => $item["link"],
                    "DESCRIPTION" => $item["description"]
                ]);
            }
            $blocks["ITEMS"] = $items;
        }

        $content = $this->render("rss/rss.xml", $blocks);

        return new Response($content, 200, $headers);
    }
}