<?php

require 'connexion.php';

$query = $db->query("SELECT * FROM users");
$users = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($users);

?>
