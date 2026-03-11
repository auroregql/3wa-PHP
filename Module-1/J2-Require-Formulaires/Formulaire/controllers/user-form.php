<?php

$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$newsletter = false;

if(isset($_POST["newsletter"]))
{
    $newsletter = true;
}

if($password === $confirmPassword)
{
    echo "Vérification des mots de passe : OK <br>";
}
else
{
    echo "Vérification des mots de passe : NOK <br>";
}

if($newsletter)
{
    echo "Email : $email | Mot de passe : $password | Newsletter : Oui";
}
else
{
    echo "Email : $email | Mot de passe : $password | Newsletter : Non";
}

?>