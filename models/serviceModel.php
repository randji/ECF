<?php

namespace theService;

class pagename
{
    private int $id_pageName;
    private string $namePage;
}

class page{
    private int $id_page;
    private string $titre;
    private string $text;
    private int $id_pageName;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getPage($id_page, $titre, $text, $id_pageName){
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $currentPage = basename($_SERVER['PHP_SELF']);

            switch ($currentPage) {
                case 'Maintenance.php':
                    $pagename = 2;
                    break;
                case 'mechanicalCar.php':
                    $pagename = 3;
                    break;
                case 'usedCarSale.php':
                    $pagename = 4;
                    break;
                case 'repairBodywork.php':
                    $pagename = 1;
                    break;
                default:
                    $pagename = 1;
            }

            $stmt = $pdo->prepare("SELECT titre, text FROM garageparrot.page WHERE pagename = :pagename");

            $stmt->execute([':pagename' => $pagename]);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $results;
    }
}


