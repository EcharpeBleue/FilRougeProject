<?php
declare(strict_types=1);

namespace app\guild\model;

class Api_key{
    private int $_idApi;
    private string $_intitule;
    private Utilisateur $_idUtilisateur;
    private PersonnageCollection $_personnages;

    public function __construct(int $idApi,string $intitule, int $idUtilisateur, PersonnageCollection $personnages=new PersonnageCollection()){
        $this->_intitule = $intitule;
        $this->_idUtilisateur = $idUtilisateur;
        $this->_personnages = $personnages;
        $this->_idApi = $idApi;
    }

    public function getIntitule():string{
        return $this->_intitule;
    }

    
    public function getIdUtilisateur():int {
        return $this->_idUtilisateur;
    }


    public function getIdApi():int {
        return $this->_idApi;
    }


    public function getPersonnages():PersonnageCollection {
        return $this->_personnages;
    }

    
    public function setIntitule(string $intitule):string{
        return $this->_intitule = $intitule;
    }


    
    public function setIdUtilisateur(int $idUtilisateur):int {
        return $this->_idUtilisateur = $idUtilisateur;
    }




    public function ajouterPersonnage(Personnage $personnage):void {
        $this->_personnages[] = $personnage;
    }



}