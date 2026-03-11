<?php
require_once "User.php";

$user1 = new User(1, "admin", "admin");
echo $user1->getId();
echo $user1->getUsername();
echo $user1->getPassword();

$user2 = new User(2, "user", "user");
echo $user2->getId();
echo $user2->getUsername();
echo $user2->getPassword();

?>