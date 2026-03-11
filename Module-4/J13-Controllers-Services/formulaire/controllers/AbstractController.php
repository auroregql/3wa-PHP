<?php
abstract class AbstractController
{

    protected function render(string $template, array $params = []): void
    {

        extract($params);

        $template = $template;

        require "templates/layout.phtml";
    }
}

?>