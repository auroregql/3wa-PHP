<?php

abstract class AbstractController
{
    protected function render(string $template, array $data = []): void
    {
        extract($data);
        
        $templatePath = "templates/" . $template . ".phtml";

        // On appelle les morceaux de ton dossier layouts
        require_once "templates/layouts/_header.phtml";
        require_once $templatePath;
        require_once "templates/layouts/_footer.phtml";
    }
}

?>