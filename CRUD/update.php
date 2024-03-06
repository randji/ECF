<?php
require "../PHP/session.php";
require "../PHP/dsn.php";

$pdo=connexionBdd($dsn, $username, $password);

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_POST)
    if(isset($_POST['titre']) && isset($_POST['texte'])){
        $titre = strip_tags($_POST['titre']);
        $texte = strip_tags($_POST['texte']);
        $id = strip_tags($_GET['id']);

        $query="UPDATE page SET titre=:titre, text=:texte WHERE id_page=:id";
        $stmt =  $pdo->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':texte', $texte);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: ../admin/dashboardAdmin.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
// vérification ID dans l'URL
if (!empty($_GET['id'])){

    //nettoyer l'id
    $id= strip_tags($_GET['id']);

    $query = "SELECT * FROM page WHERE id_page = :id";
    $stmt =  $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //si la page n'existe pas
    if (!$result){
        $_SESSION['erreur'] = "Cet ID n'existe pas";
        header('Location: ../admin/dashboardAdmin.php');
    }
}
else{
    $_SESSION['erreur'] = "ID non valide";
    header('../admin/dashboardAdmin.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour de la page</title>
    <link rel="stylesheet" href="../CSS/dashboardAdmin.css">
</head>

<body>
    <?php
    if (!empty($_SESSION['erreur'])){ ?>
        <div class="erreur">
            <?= $_SESSION['erreur'] ?>
        </div>
    <?php } ?>


<section class="back">
    <h1>Modifier page</h1>
    <form method="POST">
        <label for="titre">Titre</label><br>
        <textarea name="titre" rows="2" cols="60"><?= $result['titre']?></textarea>
        <br>
        <label for="texte">Texte</label><br>
        <textarea name="texte" rows="10" cols="50"><?= $result['text']?></textarea>
        <br>
        <button type="submit">Mettre à jour</button>
    </form>
</section>
</body>
</html>