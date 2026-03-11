<?php

require "../models/User.php";
require "../managers/UserManager.php";

if (!isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'])) {
    die("Erreur : formulaire incomplet !");
}

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];
$role     = $_POST['role'];

$user = new User(null, $username, $email, $password, $role);

$userManager = new UserManager();
$userManager->saveUser($user);

header("Location: ../index.php");
exit;

?>