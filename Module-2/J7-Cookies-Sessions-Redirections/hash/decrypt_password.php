<?php
if (isset($_POST['password']) && isset($_POST['hash'])) {

    $password = $_POST['password'];
    $hash   = $_POST['hash'];
    
}
    
$isPasswordCorrect = password_verify($password, $hash);

if($isPasswordCorrect === true)
{
	echo "le mot de passe est le bon";
}
else
{
	echo  "erreur de mot de passe";
}

?>