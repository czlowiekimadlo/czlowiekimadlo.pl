<?php

class Response
{
    public $code;
    public $content;

    public function __construct($content, $code = 200)
    {
        $this->content = $content;
        $this->code = $code;
    }

    public function __toString()
    {
        http_response_code($this->code);

        return $this->content;
    }
}
