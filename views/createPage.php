<?php


/*if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}



//menu déroulant
$sql = "SELECT * FROM pagename";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $service = $_POST['service'];

    $sql = "INSERT INTO page (titre, text, pagename) VALUES (:titre, :texte, :service)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':texte', $texte);
    $stmt->bindParam(':service', $service);
    $stmt->execute();

    $_session['message'] = "Page ajoutée avec succès";
    header('Location: ../admin/dashboardAdmin.php');
}else{
    $_SESSION['erreur'] = "Le formulaire est incomplet";
}*/

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREER UNE PAGE</title>
    <link rel="stylesheet" href="../CSS/adminPage.css">
</head>
<body>

    <main class="back">
        <div class="title">
            <p>PAGE</p>
  
        </div>
        
        <form method="POST" action="/update">
            
            
                <?php foreach ($results as $result) { 
                    echo '<label for="titre" class="label" >TITRE</label>'.'<textarea  class="selectPage1" name="titre" rows="2" cols="50" required>' . $result['titre'] . '</textarea>'. '<br>'. '<br>';
                    echo '<label for="texte" class="label">TEXTE</label>'.'<textarea class="selectPage2" name="texte" rows="5" cols="50" required>' . $result['text'] . '</textarea>'. '<br>'. '<br>';
                } ?>
            <br>
                <button type="submit">Modifier</button>

            <div class="button">
                    

                    <a href="../PHP/logout.php">
                    <button type="button" class="deconnexion">Déconnexion</button>
                    </a>

                    <a href="/back">
                    <button type="button" class="deconnexion">Retour</button>
                    </a>
            </div>
            

        </form>
    </main>
    


</body>
