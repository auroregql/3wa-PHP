<?php

require_once "Character.php";

$character = new Character(1);

echo $character->getFullName();

$character->setFirstName("Sarah");
$character->setLastName("Connor");

echo $character->getFullName();

?>