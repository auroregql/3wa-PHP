<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class AuthController extends AbstractController
{
    public function login() : void
    {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $this->render("login", []);
    }

    public function checkLogin() : void
    {

        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            $this->redirect("index.php?route=login");
            return;
        }

        $userManager = new UserManager();
        $user = $userManager->findByEmail($_POST['email']);

        if ($user && password_verify($_POST['password'], $user->getPassword())) {
            $_SESSION['user'] = $user; 
            $this->redirect("index.php");
        } else {
            $this->redirect("index.php?route=login");
        }
    }

    public function register() : void
    {

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $this->render("register", []);
    }

    public function checkRegister() : void
    {
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            $this->redirect("index.php?route=register");
            return;
        }

        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        
        if (!preg_match($regex, $_POST['password'])) {
            
            $this->redirect("index.php?route=register");
            return;
        }

        $userManager = new UserManager();
        
        $newUser = new User();
        $newUser->setUsername(htmlspecialchars($_POST['username']));
        $newUser->setEmail(htmlspecialchars($_POST['email']));
        
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $newUser->setPassword($hash);
        
        $newUser->setRole('USER');
        $newUser->setCreatedAt(new DateTime());

        $userManager->create($newUser);

        $_SESSION['user'] = $newUser;
        $this->redirect("index.php");
    }

    public function logout() : void
    {
        session_destroy();
        $this->redirect("index.php");
    }
}

?>