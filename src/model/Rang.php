<?php
namespace app\Guilde\model;
class Rang{
    private int $_idRang;
    private string $_intituleRang;
    private string $_rang;
    private UtilisateurCollection $_idUtilisateur;
    public function __construct(int $id = 0, string $intitule = 'Nouveau Menbre', string $rang = 'noob') {
        $this->_idRang= $id;
        $this->_intituleRang = $intitule;
        $this->_rang = $rang;
       
       
    }
    public function getRang():UtilisateurCollection
    {
        return $this->_rang;
    }
    public function getRangIntitule():UtilisateurCollection
    {
        return $this->_rang;
    }
    public function setRangIntitule(UtilisateurCollection $intitule)
    {
        $this->_intituleSignalement= $intitule;
    }

    public function setRang(UtilisateurCollection $rang)
    {
        $this->_rang= $rang;
    }
}