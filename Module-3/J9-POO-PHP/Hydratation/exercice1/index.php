<?php

require_once "connexion.php";
require_once "User.php";

$sql = "SELECT * FROM users";

$stmt = $pdo->query($sql);

$users = [];

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $user = new User(
        $data["first_name"],
        $data["last_name"],
        $data["email"]
    );

    $user->setId($data["id"]);

    $users[] = $user;
}

foreach ($users as $user) {
    echo $user->getId() . " ";
    echo $user->getFirstName() . " ";
    echo $user->getLastName() . " ";
    echo $user->getEmail() . "<br>";
}



$newUser = new User("Clark", "Kent", "clark.kent@test.fr");

$sql = "INSERT INTO users (first_name, last_name, email) 
        VALUES (:first_name, :last_name, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    "first_name" => $newUser->getFirstName(),
    "last_name"  => $newUser->getLastName(),
    "email"      => $newUser->getEmail()
]);

// Récupération de l'id généré
$newUser->setId($pdo->lastInsertId());

echo "<br>Nouvel utilisateur créé : ";
echo $newUser->getId() . " ";
echo $newUser->getFirstName() . " ";
echo $newUser->getLastName() . " ";
echo $newUser->getEmail();

?>