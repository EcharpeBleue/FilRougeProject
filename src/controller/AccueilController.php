<?php
declare(strict_types=1);

namespace app\guild\controller;

use app\guild\model\Database;
use app\guild\model\Utilisateur;

class AccueilController extends BaseController
{
    public function index():void
    {
        $this->view("Accueil/index");
    }

    public function verification(){
        if (isset($_POST["connecter"])) {
    
            $this->view("Accueil/connecter");
        }
       
    }


}