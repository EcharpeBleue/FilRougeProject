<?php

declare(strict_types=1);

namespace app\guild\controller;

use app\guild\model\Personnage;

class ApiController {

    public static function personnage() {
        header('Content-Type: application/json; charset=utf-8');
        $liste = Personnage::list();
        echo json_encode($liste); 
    }
}
