
<?php
require "../dsn.php";
require "../opinion/classopinion.php";

$pdo = connexionBdd($dsn, $username, $password);

if($_POST){
    $firstname = strip_tags( $_POST['firstname']);
    $lastname = strip_tags($_POST['lastname']) ;
    $mail = strip_tags($_POST['email']) ;
    $opinion = strip_tags($_POST['opinion']) ;
    $rating = strip_tags($_POST['rating']) ;


    $visitor = new visitor($pdo);
    $success = $visitor->submitOpinion($firstname, $lastname, $mail, $opinion, $rating);
    //$visitor->sendMail("stephanesoilihi@yahoo.fr", "Nouvel avis", "Un nouvel avis a été posté sur le site");


    if ($success) {
        echo"success";
    } else {
        echo "error";
    }
}