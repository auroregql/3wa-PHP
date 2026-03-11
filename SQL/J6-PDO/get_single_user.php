<?php

require 'connexion.php';

$query = $db -> prepare('SELECT * FROM users WHERE id = :id');
$parameters = [
    'id' => $_GET['id']
];
$query->execute($parameters);
$user = $query->fetch(PDO::FETCH_ASSOC);

var_dump($user);

?>