<?php

require "../models/User.php";
require "../managers/UserManager.php";

if (!isset($_GET['id'])) {
    die("Erreur : aucun ID spécifié !");
}

$id = (int)$_GET['id'];

$user = new User($id, "", "", "", "");

$userManager = new UserManager();
$userManager->deleteUser($user);

header("Location: ../index.php");
exit;

?>