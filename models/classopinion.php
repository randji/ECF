<?php

class visitor{
    public string $firstname;
    public string $lastname;
    public string $mail;
    public string $message;
    public $rating;
    private  $pdo;

    public function sendMail($to, $subject, $message)
    {
        mail($to, $subject, $message);
    }

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function submitOpinion($firstname, $lastname, $mail, $opinion, $rating)
    {
        try{
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->mail = $mail;
            $this->message = $opinion;
            $this->rating = $rating;

            $stmt = $this->pdo->prepare("INSERT INTO visitor (firstname, lastname, mail, message, rating) VALUES (:firstname, :lastname, :mail, :message, :rating)");
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':mail', $this->mail);
            $stmt->bindParam(':message', $this->message);
            $stmt->bindParam(':rating', $this->rating);
            $success = $stmt->execute();
            return $success;
        }
        catch (PDOException $e) {
                error_log("Erreur lors de la connexion à la base de données: " . $e->getMessage());
                exit('Une erreur s\'est produite lors de la connexion à la base de données. Veuillez réessayer plus tard.');
        }
}
}