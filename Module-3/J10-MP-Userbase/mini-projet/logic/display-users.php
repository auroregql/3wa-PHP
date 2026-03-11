<?php 

require "../models/User.php";
require "../managers/UserManager.php";

$userManager = new UserManager();
$userManager->loadUsers();

$users = $userManager->getUsers();

?>