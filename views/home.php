<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Mogra&family=Ramaraja&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style_index.css">
    <title>Garage V.Parrot</title>
</head>
<body class="grid-container">

<?php require 'header.php'; ?>

<main>
    <a href="PHP/login.php">
        <button type="button" class="connexion">Connexion</button>
    </a>

    <img class="logo" src="img/LOGO_Vparrot.png" alt="logo">
    <img class="fond" src="img/voitureFond.png" alt="voiture">

    <p class="slogan">“Laissez votre voiture <br>
        entre de bonnes mains”</p>

    <div class="service">

        <a href="index.php?controller=serviceController&id=1">
            <button type="button" class="reparation">Réparation de carrosserie</button>
        </a>


        <a href="index.php?controller=serviceController&id=3">
            <button type="button" class="mecanique">Mécanique des voitures</button>
        </a>


        <a href="index.php?controller=serviceController&id=2">
            <button type="button" class="entretien">Entretien régulier</button>
        </a>

        <a href="index.php?controller=serviceController&id=4">
            <button type="button" class="vente">Vente de véhicules d'occasion</button>
        </a>
    </div>



    <div class="temoignage">
        <p class="intitule">TEMOIGNAGE</p>
        <div class="client">
            <p class="nom"> Serge</p>
            <p class="commentaire">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis assumenda nulla voluptate cumque quamt."</p>
        </div>
        <div class="client">
            <p class="nom"> Claire</p>
            <p class="commentaire">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis assumenda nulla voluptate cumque quamt"</p>
        </div>
        <div class="client">
            <p class="nom"> Robert</p>
            <p class="commentaire">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis assumenda nulla voluptate cumque quamt"</p>
        </div>
    </div>
</main>
<footer>
    <?php require 'footer.php' ?>
</footer>

<script>
    window.addEventListener('scroll', function() {
        var temoignageElements = document.querySelectorAll('.temoignage > div');
        var windowHeight = window.innerHeight;

        temoignageElements.forEach(function(element, index) {
            var rect = element.getBoundingClientRect();
            if (rect.top < windowHeight) {
                var delay = index * 0.2;

                if (index % 2 === 0) {
                    element.style.animation = `slideInFromLeft 1s ${delay}s forwards`;
                } else {
                    element.style.animation = `slideInFromRight 1s ${delay}s forwards`;
                }

            }

        });
    });
</script>

</body>
</html>
