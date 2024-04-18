<?php

declare(strict_types=1);

namespace app\guild\controller;

use app\guild\model\Personnage;

class PersonnageController extends BaseController
{
 
        // public static function personnage() {
            
        //     header('Content-Type: application/json; charset=utf-8');
        //     $liste = Personnage::list();
        //     echo json_encode($liste); 
        // }
        public function personnage(){
            $this->addParam("liste",Personnage::List());
            $this->view('api/liste_personnage');
        }
    
}