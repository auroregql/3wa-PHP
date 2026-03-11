<?php
class Router
{
    public function handleRequest(): void
    {
        $authController = new AuthController();

        if ($_GET['route'] ?? null === null) {
            $authController->login();
        } else {
            $authController->notFound();
        }
    }
}
?>