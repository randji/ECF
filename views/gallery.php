

<?php
require "../dsn.php";
require "../function/filterCarUsed.php";

$pdo=connexionBdd($dsn, $username, $password);

function getAllCars($pdo){
    $sql=  "SELECT * FROM garageparrot.cars";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchall(PDO::FETCH_ASSOC);
    
}



if (isset($_POST['getAllCars']) && $_POST['getAllCars'] === 'true') {
    $voitures = getAllCars($pdo);
    echo json_encode($voitures);
    exit;
    
} 

else if (isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
    $column = 'price';
    $min= $_POST['minPrice'];
    $max= $_POST['maxPrice'];
    $voitures=filter($column, $min, $max, $pdo);
    exit;
}

else if (isset($_POST['minkm']) && isset($_POST['maxkm'])) {
    $column = 'numberKm';
    $min= $_POST['minkm'];
    $max= $_POST['maxkm'];
    $voitures=filter($column, $min, $max, $pdo);
    exit;
}

else if (isset($_POST['minYear']) && isset($_POST['maxYear'])) {
    $column = 'yearsService';
    $min= $_POST['minYear'];
    $max= $_POST['maxYear'];
    $voitures=filter($column, $min, $max, $pdo);
    exit;
}
        



/*if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    if (isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
        $minPrice = $_POST['minPrice'];
        $maxPrice = $_POST['maxPrice'];

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            if (isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
                
    }
}*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Mogra&family=Ramaraja&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../CSS/galleryStyle.css">
    <link rel="stylesheet" href="../CSS/galleryMediaQueries.css">
    <title>galerie voiture d'occasion</title>
</head>

<body>

    <?php require '../header.php'; ?>



    <nav class="navbar">
        <h1 class="title">FILTRE</h1>
        
        <label class="titleSlide1" for="price-slider">PRIX :</label> 
        <div class="containerSlider1"> 
            <span class="min">min:</span>
            <span class="minValue" id="minPrice"> 0</span>
        <div class="slider" id="price-slider"></div>
            <span class="max">max:</span>
            <span class="maxValue" id="maxPrice">100000</span>
        </div>

        <label class="titleSlide2" for="km-slider">KILOMETRAGE : </label>
        <div class="containerSlider2">
            <span class="min">min:</span>
            <span class="minValue" id="minkm">0</span>
        <div class="slider" id="km-slider"></div>
            <span class="max">max:</span>
            <span class="maxValue" id="maxkm">300000</span>
        </div>

        <label class="titleSlide2" for="year-slider">ANNEE : </label>
        <div class="containerSlider3">
            <span class="minValueYear" id="minYear">2010</span>
        <div class="slider" id="year-slider"></div>
            <span class="maxValueYear" id="maxYear">2023</span>
        </div>

    <img class="logo" src="../img/logo_Vparrot.png" alt="logo garage parrot">
        
    </nav>


    <main>
        <div class="titleUsed">
            <h1>Voiture d'occasion</h1>
        </div>
        <div class="cars-container">
            <?php
                foreach ($voitures as $voiture){
            ?>
            <div class="card">
                <img class="imgCar" src="<?= $voiture['photo']?>" alt="image voiture">

                <p>Modèle : <?=$voiture['model']?> </p>
                <p>Prix :<?=$voiture['price']?> </p>
                <p>Année : <?=$voiture['yearsService']?></p>
                <p>Kilométrage : <?=$voiture['numberKm']?></p>
                <a href="detailCar.php?id=<?=$voiture['id_car'] ?>">
                    <button type="button" class="detail">details</button>
                </a>
            </div>
        </div>
            <?php } ?>

    </main>

    
    <?php require '../footer.php' ?>
    
    <script>
        // JavaScript

        function updateCarsTable(data) {
                // Convertir les données JSON en objet JavaScript
                //var cars = JSON.parse(data);
                if (!data) {
        console.error('No data received');
        return;
    }

    // Essayer de parser les données JSON
    try {
        var cars = JSON.parse(data);
    } catch (error) {
        console.error('Failed to parse data:', data);
        return;
    }
                
                // Sélectionner la table
                var container = document.querySelector('.cars-container');

                // Vider la table
                // container.innerHTML = '';
                while (container.firstChild) {
                container.removeChild(container.firstChild);
                }

                // Créer de nouvelles lignes pour chaque voiture
                cars.forEach(function(car) {
                    var row = document.createElement('div');
                    row.className = 'card';

                    // Ajouter les données de la voiture à la ligne
                    row.innerHTML = `
            <img class="imgCar" src="${car.photo}" alt="image voiture">
            <p>Modèle : ${car.model}</p>
            <p>Prix : ${car.price}</p>
            <p>Année : ${car.yearsService}</p>
            <p>Kilométrage : ${car.numberKm}</p>
            <a href="detailCar.php?id=${car.id_car}">
                <button type="button" class="detail">details</button>
            </a>
            `;

                    // Ajouter la ligne à la table
                    container.appendChild(row);
                });
            }

        window.onload = function() {
        // Faire une requête AJAX pour récupérer toutes les voitures
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'gallery.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
        if (this.status == 200) {
            updateCarsTable(this.responseText);
            }
        };
        xhr.send('getAllCars=true');
};


        $(document).ready(function() {
            var minPriceDisplay = document.getElementById('minPrice');
            var maxPriceDisplay = document.getElementById('maxPrice');

            $("#price-slider").slider({
                range: true,
                min: 0,
                max: 100000,
                values: [0, 100000],
                slide: function(event, ui) {
                    minPriceDisplay.textContent = ui.values[0];
                    maxPriceDisplay.textContent = ui.values[1];
                },
                stop: function(event, ui) {
                    $.ajax({
                    url: 'gallery.php',
                    type: 'POST',
                    data: {
                        minPrice: ui.values[0],
                        maxPrice: ui.values[1]
                    },
                    success: function(data) {
                        console.log('updateCarsTable called'); updateCarsTable(data);
                    }
                    });
                }
            }); 
        });
$(document).ready(function() {
    var minKmDisplay = document.getElementById('minkm');
    var maxKmDisplay = document.getElementById('maxkm');

    $("#km-slider").slider({
        range: true,
        min: 0,
        max: 300000,
        values: [0, 300000],
        slide: function(event, ui) {
            minKmDisplay.textContent = ui.values[0];
            maxKmDisplay.textContent = ui.values[1];
        },
        stop: function(event, ui) {
                    $.ajax({
                    url: 'gallery.php',
                    type: 'POST',
                    data: {
                        minPrice: ui.values[0],
                        maxPrice: ui.values[1]
                    },
                    success: function(data) {
                        console.log('updateCarsTable called'); updateCarsTable(data);
                    }
                    });
                }
            }); 
        });

$(document).ready(function() {
    var minYearDisplay = document.getElementById('minYear');
    var maxYearDisplay = document.getElementById('maxYear');

    $("#year-slider").slider({
        range: true,
        min: 2010,
        max: 2023,
        values: [2010, 2023],
        slide: function(event, ui) {
            minYearDisplay.textContent = ui.values[0];
            maxYearDisplay.textContent = ui.values[1];
        },
        stop: function(event, ui) {
                    $.ajax({
                    url: 'gallery.php',
                    type: 'POST',
                    data: {
                        minYear: ui.values[0],
                        maxYear: ui.values[1]
                    },
                    success: function(data) {
                        console.log('updateCarsTable called'); updateCarsTable(data);
                    }
                    });
                }
            }); 
        });
</script>
</body>
</html>