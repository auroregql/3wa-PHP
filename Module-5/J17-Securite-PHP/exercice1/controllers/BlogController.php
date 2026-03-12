<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class BlogController extends AbstractController
{
    public function home() : void
    {
    
        $postManager = new PostManager();
        $latestPosts = $postManager->findLatest();

     
        $this->render("home", [
            "posts" => $latestPosts
        ]);
    }

    public function category(string $categoryId) : void
    {
        $categoryManager = new CategoryManager();
        $postManager = new PostManager();

        $category = $categoryManager->findOne((int)$categoryId);

        if ($category) {

            $posts = $postManager->findByCategory((int)$categoryId);
            
            $this->render("category", [
                "category" => $category,
                "posts" => $posts
            ]);
        } else {

            $this->redirect("index.php");
        }
    }

    public function post(string $postId) : void
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->findOne((int)$postId);

        if ($post) {

            $comments = $commentManager->findByPost((int)$postId);

            $this->render("post", [
                "post" => $post,
                "comments" => $comments
            ]);
        } else {
            $this->redirect("index.php");
        }
    }

    public function checkComment() : void
    {

        $content = htmlspecialchars($_POST['content']);
        $postId = (int)$_POST['post_id'];

        $comment = new Comment();
        $comment->setContent($content);

        $comment->setUser($_SESSION['user']); 
        $postManager = new PostManager();
        $comment->setPost($postManager->findOne($postId));

        $commentManager = new CommentManager();
        $commentManager->create($comment);

        $this->redirect("index.php?route=post&post_id={$postId}");
    }
}

?>