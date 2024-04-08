<?php
require_once "../dsn.php";
//require_once "../PHP/session.php";
//employeOnly();

$pdo=connexionBdd($dsn, $username, $password);

$sql="SELECT * FROM visitor";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$opinions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Opinions des visiteurs</title>
  <link rel="stylesheet" href="../CSS/dashboardEmploye.css">
</head>
<body>
<div class="back">
    <div class="title">
        <h1>tableau de bord<br>Bonjour Mr <?php echo $_SESSION['user']['name'] ?></h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>Avis</th>
                <th>Note</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($opinions as $opinion) { ?>
                <tr>
                    <td><?= $opinion['firstname'] ?></td>
                    <td><?= $opinion['lastname'] ?></td>
                    <td><?= $opinion['mail'] ?></td>
                    <td><?= $opinion['message'] ?></td>
                    <td><?= $opinion['rating'] ?></td>
                    <td>
                        <a href="opinionValid.php?id=<?= $opinion['id_visitor']?>">
                            <button type="button" class="valider">VALIDER</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>



</body>
</html>
