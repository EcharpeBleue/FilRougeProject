<?php
declare(strict_types=1);
namespace app\FilRougeProject\model;


Class Personnage {
    private $evenement;
    private int $_niveau;
    private string $_equipement;
    public function __construct(Evenement $evenement,int $niveau, string $equipement){
        $this->_niveau = $niveau;
        $this->_equipement = $equipement;
    }

    public function getNiveau():int {
        return $this->_niveau;
    }
    
    public function getEquipement():string {
        return $this->_equipement;
    }

    public function setNiveau($niveau):void {
       $this->_niveau = $niveau;
    }
    
    public function setEquipement($equipement):void {
        $this->_equipement = $equipement;
    }

    public function demanderEvenement() {
       
        $this->evenement->demarrer();
    }

}