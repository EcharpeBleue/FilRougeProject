<?php
declare(strict_types=1);
namespace app\guild\model;

// use app\FilRougeProject\model\Database;
use app\FilRougeProject\model\Personnage;

class PersonnageCollection extends \ArrayObject {
    private $_listePersonnages = [];

    public function __construct(){
        $this->_listePersonnages = [];
    }
}