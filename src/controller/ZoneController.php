<?php
declare(strict_types=1);
namespace app\guild\controller;
use app\guild\model\Zone;
class ApiZone
{
 

    public static function ApiZone()
    {
        header('Content-Type: application/json; charset=utf-8');
        $liste = Zone::list();
        echo json_encode($liste);
    }
}