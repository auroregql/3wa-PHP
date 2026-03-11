<?php
    $users = [
        [
            "firstName" => "Bugs",
            "lastName" => "Bunny",
            "age" => 29
        ],
        [
            "firstName" => "Roger",
            "lastName" => "Rabbit",
            "age" => 17
        ]
    ];
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 4</title>
    </head>
    <body>
        <h1>
            Liste des utilisateurs
        </h1>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <?php foreach ($user as $key => $value): ?>
            
                        <?php if ($key === "age"): ?>
                            <?= $value < 18 ? "Statut : Mineur" : "Statut : Majeur" ?><br>
            
                        <?php else: ?>
                            <?= "$key : $value" ?><br>
            
                        <?php endif; ?>
            
                    <?php endforeach; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>

