<?php

require 'connexion.php';


$street = $_POST["street"];
$city = $_POST["city"];
$zipcode = $_POST["zipcode"];

$query = $db->prepare("INSERT INTO address (id,street, city, zipcode) VALUES (NULL, :street, :city, :zipcode)");

$parameters = [
    'street' => $_POST['street'],
    'city' => $_POST['city'],
    'zipcode' => $_POST['zipcode']
    
];

$query->execute($parameters);

$id = $db->lastInsertId();

?>