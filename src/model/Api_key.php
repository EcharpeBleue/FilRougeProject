<?php
declare(strict_types=1);

namespace app\FilRougeProject\model;

class Api_key{
    private int $_idApi;
    private string $_intitule;
    private int $_idUtilisateur;
    private string $_avecSesPersos;

    public function __construct(int $idApi,string $intitule, int $idUtilisateur, string $avecSesPersos){
        $this->_intitule = $intitule;
        $this->_idUtilisateur = $idUtilisateur;
        $this->_avecSesPersos = $avecSesPersos;
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


    public function getAvecSesPersos():string {
        return $this->_avecSesPersos;
    }

    
    public function setIntitule():string{
        return $this->_intitule = $intitule;
    }


    
    public function setIdUtilisateur():int {
        return $this->_idUtilisateur = $idUtilisateur;
    }




    public function setAvecSesPersos():string {
        return $this->_avecSesPersos = $avecSesPersos;
    }



}