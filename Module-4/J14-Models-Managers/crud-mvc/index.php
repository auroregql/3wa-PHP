<?php
// On charge les fichiers nécessaires via l'autoload
require 'config/autoload.php';

// On crée une instance du routeur
$router = new Router();

// On lui passe le tableau $_GET pour qu'il sache quoi faire
$router->handleRequest($_GET);

?>