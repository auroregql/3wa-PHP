<?php

class Router
{
    public function handleRequest(): void
    {
        $controller = new BlogController();

        if (!isset($_GET['route']) || empty($_GET['route'])) {
            $controller->index();
        }
        elseif (
            $_GET['route'] === 'article'
            && isset($_GET['id'])
        ) {
            $article = $_GET['id'];
            $controller->article($article);
        }
        else {
            $controller->notFound();
        }
    }
}

?>