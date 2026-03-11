<?php 
session_start();
require "../connexion.php";

if (isset($_POST["email"], $_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $parameters = [
        'email' => $email
    ];
    $query->execute($parameters);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($user === false) {
        echo "<h1>Email incorrect</h1>";
    } else {
        $passwordIsValid = password_verify($password, $user["password"]);
        if (!$passwordIsValid)
        {
            echo "<h1>Mot de passe incorrect</h1>";
        } else {
            $_SESSION["user"] = ["last_name" => $user["last_name"], "first_name" => $user["first_name"]];
            header("Location: ../index.php?route=home");
        }
    }
}
