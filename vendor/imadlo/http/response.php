<?php

class Response
{
    public $code;
    public $headers;
    public $content;

    public function __construct($content, $code = 200, $headers = [])
    {
        $this->content = $content;
        $this->headers = $headers;
        $this->code = $code;
    }

    public function __toString()
    {
        http_response_code($this->code);

        $this->applyHeaders();

        return $this->content;
    }

    private function applyHeaders()
    {
        foreach ($this->headers as $header => $value) {
            header("$header: $value");
        }

        return;
    }
}
