<?php

require 'connexion.php';


$street = $_POST["street"];
$city = $_POST["city"];
$zipcode = $_POST["zipcode"];

$query = $db->prepare("UPDATE address SET street = :street, city = :city, zipcode = :zipcode WHERE id = :id");

$parameters = [
    'id' => $_POST['id'],
    'street' => $_POST['street'],
    'city' => $_POST['city'],
    'zipcode' => $_POST['zipcode']
];

$query->execute($parameters);

?>