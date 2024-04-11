<?php
declare(strict_types=1);
namespace app\guild\model;
class Rang{
    private int $_id;
    private string $_intitule;
    private string $_description;
    private UtilisateurCollection $_utilisateurs;
    private EvenementCollection $_evenements;
    public function __construct(int $id = 0, string $description = 'Nouveau Menbre', string $intitule = 'noob', UtilisateurCollection $utilisateurs = new UtilisateurCollection(), EvenementCollection $evenements = new EvenementCollection()) {
        $this->_id= $id;
        $this->_intitule = $intitule;
        $this->_description = $description;  
        $this->_utilisateurs = $utilisateurs;
        $this->_evenements = $evenements;
        
    }
    public function getUtilisateurs():UtilisateurCollection
    {
        return $this->_utilisateurs;
    }
    public function getEvenements():EvenementCollection
    {
        return $this->_evenements;
    }
    public function addEvenement(Evenement $evenement)
    {
        $this->_evenements[] = $evenement;
    }
    public function addUtilisateur(Utilisateur $utilisateur)
    {
        $this->_utilisateurs[] = $utilisateur;
    }
    public function getIntitule():string
    {
        return $this->_intitule;
    }
    public function setIntitule(string $intitule)
    {
        $this->_intitule= $intitule;
    }
    public function getDescription():string
    {
        return $this->_description;
    }
    public function setDescription(string $description)
    {
        $this->_description= $description;
    }

}