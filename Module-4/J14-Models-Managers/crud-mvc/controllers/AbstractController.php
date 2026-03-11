<?php
// controllers/AbstractController.php

abstract class AbstractController {
    /**
     * @param string $template Le nom du fichier (ex: "users/list")
     * @param array $data Les variables à transmettre à la vue
     */
    protected function render(string $template, array $data = []): void {
        // Transforme les clés du tableau en variables exploitables dans le template
        extract($data);

        // Cette variable $template sera utilisée dans layout.phtml
        // On ajoute le chemin et l'extension
        $template = "templates/$template.phtml";

        require 'templates/layout.phtml';
    }

    protected function redirect(string $route): void {
        header("Location: index.php?route=$route");
        exit();
    }
}
