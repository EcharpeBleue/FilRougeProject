<?php
declare(strict_types=1);
namespace app\FilRougeProject\model;
class Type_signalement{
    private string $_institule;

    public function __construct(string $_institule){
        $this->_intitule = $intitule;
    }

    public function getIntitule():string{
        return $this->_intitule; 
    }

    public function setIntitule():string{
        return $this->_intitule = $intitule; 
    }

}
