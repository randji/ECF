<?php
use connexion\Database;


$pdo = new Database();
$pdo = $pdo->getConnection();

if(!isset($pdo)){
    echo "Not connected";   
}

$sql=  "SELECT * FROM garageparrot.schedule";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$horaire = $stmt->fetch(PDO::FETCH_ASSOC);


?>



<footer class="background">

    <p class="tel">tel: 01 12 25 45 74</p>
    <div class="horaire">
        <p class="titreH"><u>HORAIRE</u></p>
        <p class="planningH"><?=$horaire['week'] ?><br><?=$horaire['sunday'] ?></p>
    </div>
    <form class="formulaire" action="" >Formulaire <br> de contact</form>

</footer>
