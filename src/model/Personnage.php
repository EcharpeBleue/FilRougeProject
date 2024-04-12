<?php
declare(strict_types=1);
namespace app\guild\model;
Class Personnage {
    private int $_id;
    private EvenementCollection $_evenements;
    private int $_niveau;
    private string $_equipement;
    private Utilisateur $_utilisateur;

    public function __construct(int $id =0 ,EvenementCollection $evenements = new EvenementCollection(),int $niveau, string $equipement, Utilisateur $utilisateur){
        $this->_niveau = $niveau;
        $this->_equipement = $equipement;
        $this->_id = $id;
        $this->_evenements = $evenements;
        $this->_utilisateur = $utilisateur;
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

    public function getEvenements():EvenementCollection {
       
        return $this->_evenements;
    }
    public function addEvenement(Evenement $evenement)
    {
        $this->_evenements[]=$evenement;
    }

  public function demander(){
    $this->_evenements->participer();
  }

}