<?php
$dsn = 'mysql:host=localhost;dbname=garageparrot';
$username = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];

    $query="SELECT * FROM garageparrot.users where mail = :email";
    $stmt =  $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();

    if ($stmt->rowCount() == 1){
        $monUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($passwordForm, $monUser['password'])){
            if ($monUser['role'] == 'admin') {
                header("location: dashboardAdmin.php");
            }
            else{
                header("location: dashboardEmploye.php");
            }
        }
    }
        else{
            echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<head>";
            echo "<title>Inscription Réussie</title>";
            echo "<style>";
            echo "  .message-success {";
            echo "    color: green;";
            echo "    font-size: 24px;";
            echo "    text-align: center;";
            echo "    margin-top: 50px;";
            echo "  }";
            echo "</style>";
            echo "</head>";
            echo "<body>";
            echo "  <div class='message-success'>Utilisateur introuvable. Vérifier mail ou mot de passe.</div>";
            echo "</body>";
            echo "</html>";
        }
}
catch (PDOException $e){
    echo "Erreur lors de l'inscription: ".$e->getMessage();
}


