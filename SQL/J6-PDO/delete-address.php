<?php

require 'connexion.php';


$street = $_POST["street"];
$city = $_POST["city"];
$zipcode = $_POST["zipcode"];

$query = $db->prepare("DELETE FROM address WHERE id = :id");
$parameters = [
    'id' => $_POST['id']
];

$query->execute($parameters);

?>