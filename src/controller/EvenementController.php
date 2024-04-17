<?php
declare(strict_types=1);
namespace app\guild\controller;
use app\guild\model\Evenement;

class EvenementController extends BaseController
{
    public static function evenement()
    {
        header('Content-Type: application/json; charset-utf-8');
        $liste = Evenement::list();
        echo json_encode($liste);
    }
}