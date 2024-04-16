<?php
namespace Controllers;

class homeController extends Controller
{
    public function home(): void
    {
        
        require_once "views/home.php";
    }
}

