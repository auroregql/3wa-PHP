<?php

$host = "db.3wa.io";
$port = "3306";
$dbname = "auroregicquelcolleu_phpj6";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

$user = "auroregicquelcolleu";
$password = "514b3eda307289da5b9ccb0a4735bcd4";

$db = new PDO(
    $connexionString,
    $user,
    $password

);
    
var_dump($db);

?>
