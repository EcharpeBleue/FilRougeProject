<?php
declare(strict_types=1);

namespace app\guild\controller;

class AccueilController extends BaseController
{
    public function index():void
    {
        $this->view("Accueil/index");
    }
}