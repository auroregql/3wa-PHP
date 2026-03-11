<?php

class BlogController extends AbstractController
{
    public function index()
    {
        require "data/data-articles.php";

        $this->render("blog", ["articles" => $articles]);
    }

    public function article($id)
    {

        require "data/data-articles.php";


        if ($id === null || !isset($articles[$id])) {
            $this->notFound();
            return;
        }

        $article = $articles[$id];

        $this->render("article", ["article" => $article]);
    }

    public function notFound()
    {
        $this->render("notFound");
    }
}

?>