<?php
class AuthController extends AbstractController
{
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['email'])) {
                $email = $_POST['email'];
                $this->render("login", ['email' => $email]); 
            } else {
                echo "Email manquant !";
                $this->render("login"); 
            }
        } else {
            $this->render("login"); 
        }
    }

    public function notFound(): void
    {
        $this->render("notFound");
    }
}

?>