<?php
declare(strict_types=1);
namespace app\guild\model;
Class Personnage {
    private int $_id;
    private EvenementCollection $evenements;
    private int $_niveau;
    private string $_equipement;

    public function __construct(int $id ,Evenement $evenements,int $niveau, string $equipement){
        $this->_niveau = $niveau;
        $this->_equipement = $equipement;
        $this->_id = $id;
    }

    public function getId():int {
        return $this->_id;
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
       
        $this->_evenement->demarrer();
    }

}