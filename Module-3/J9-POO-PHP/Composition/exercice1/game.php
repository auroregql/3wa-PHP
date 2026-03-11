<?php

require_once "Character.php";
require_once "Weapon.php";

$character = new Character("Ragnar");

$weapon = new Weapon("Sword", 10);

$character->setWeapon($weapon);

echo "Character : " . $character->getName();
echo "Weapon : " . $character->getWeapon()->getName();
echo "Damages : " . $character->getWeapon()->getDamages();

echo $character->fight();

?>