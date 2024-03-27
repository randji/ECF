<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&family=Mogra&family=Ramaraja&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/opinionStyle.css">
    <title>Votre avis nous interesse</title>
</head>
<body>

    <?php require '../header.php'; ?>


    <form class="form" action="submit_opinion.php" method="post">
        
    
        <label for="firstname">Prénom:</label>
        <input type="text" id="firstname" name="firstname" required><br>
        
        
        <label for="lastname">Nom:</label>
        <input type="text" id="lastname" name="lastname" required><br>
        
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        
        <label for="opinion">Avis:</label>
        <textarea id="opinion" name="opinion" rows="5" cols="50" required></textarea><br>
        
        
        <label for="rating">Note:</label>
        <div class="star-rating">
                <input id="star5" name="rating" type="radio" value="5" class="radio-btn hide" />
                <label for="star5">☆</label>
                <input id="star4" name="rating" type="radio" value="4" class="radio-btn hide" />
                <label for="star4">☆</label>
                <input id="star3" name="rating" type="radio" value="3" class="radio-btn hide" />
                <label for="star3">☆</label>
                <input id="star2" name="rating" type="radio" value="2" class="radio-btn hide" />
                <label for="star2">☆</label>
                <input id="star1" name="rating" type="radio" value="1" class="radio-btn hide" />
                <label for="star1">☆</label>
                <!--<div class="clear"></div>-->
        </div>
        <br>
        <br>
        <input type="submit" value="Soumettre">
    </form>

    <?php require '../footer.php'; ?>
</body>
</html>