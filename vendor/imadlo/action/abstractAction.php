<?php

abstract class abstractAction
{
    protected $bag;

    public function __construct($bag)
    {
        $this->bag = $bag;
    }

    abstract public function execute();

    protected function parse($markdown)
    {
        return $this->bag->parsedown->text($markdown);
    }

    protected function render($templateName, $blocks = [])
    {
        return $this->bag->template->render(
            $templateName,
            $blocks
        );
    }

    protected function cleanSlug($route)
    {
        return preg_replace("/[^a-z_0-9]/", "", $route);
    }

    protected function generateError($httpCode)
    {
        return $this->bag->errorAction->executeCode($httpCode);
    }

    protected function generate404()
    {
        return $this->bag->errorAction->executeCode(404);
    }
}