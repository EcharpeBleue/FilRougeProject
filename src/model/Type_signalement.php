<?php
declare(strict_types=1);
namespace app\FilRougeProject\model;
class Type_signalement {
    private Liste_Blanche $verification;
    private int $_idTypeEvenement;
    private string $_institule;

    public function __construct(Liste_Blanche $verification,int $idTypeEvenement,string $_institule){
        $this->_intitule = $intitule;
        $this->_idTypeEvenement = $idTypeEvenement;
    }

    public function getIdTypeEvenement():int {
        return $this->_idTypeEvenement;
    }
    public function getIntitule():string{
        return $this->_intitule; 
    }

    public function setIntitule():string{
        return $this->_intitule = $intitule; 
    }

    public function verificationPerso(){
        return $this->verification->verifer();
    }

}
