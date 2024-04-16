<?php
/*require "../dsn.php";
require "../PHP/session.php";

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$pdo=connexionBdd($dsn, $username, $password);
//recuperer l'id de la page selectionnée
    if (isset($_POST['service'])){
        $idServiceForm = $_POST['service'];
//recuperer le titre correspondant à l'id selectionné (clé étrangère de la table page)
        $sql = "SELECT * FROM page INNER JOIN pagename ON page.pagename = pagename.id_pageName WHERE pagename.id_pageName = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idServiceForm);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        echo "erreur";
    }*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur : page</title>
    <link rel="stylesheet" href="../CSS/dashboardAdmin.css">
</head>
<body>
        <section class="back">
            <table class="tableau">
                <thead>
                <th>titre</th>
                <th>texte</th>
                <th>actions</th>
                </thead>
                <tbody>
                <?php foreach ($results as $result){ ?>
                    <tr>
                        <td><?= $result['titre'] ?> </td>
                        <td><?= $result['text'] ?> </td>
                        <td> <a href="../CRUD/update.php?id=<?= $result['id_page']?>">Modifier</a>
                            <a href="../CRUD/delete.php?id=<?= $result['id_page']?>">supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <a href="../CRUD/create.php">Ajouter une page</a>
        </section>
</body>
</html>
