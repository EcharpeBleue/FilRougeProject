<?php
declare(strict_types=1);
namespace app\guild\model;
class Type_signalement {
    private int $_id;
    private string $_intitule;

    public function __construct(int $id=0,string $intitule){
        $this->_intitule = $intitule;
        $this->_id = $id;
    }

    public function getId():int {
        return $this->_id;
    }
    public function getIntitule():string{
        return $this->_intitule; 
    }

    public function setIntitule(string $intitule):string{
        return $this->_intitule = $intitule; 
    }
}
