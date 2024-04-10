<?php
namespace app\Guilde\model;
class Utilisateur{
    private int $_idUtilisateur;
    private string $_pseudo;
    private string $_mail;
    private string $_motDePasse;

    public function __construct(int $id = 0, string $pseudo = '', string $mail = "", string $motDePasse) {
        $this->_idUtilisateur = $id;
        $this->_pseudo = $pseudo;
        $this->_mail = $mail;
        $this->_motDePasse = $motDePasse
       
       
    }
    public function getUtilisateurId():int
    {
        return $this->_idUtilisateur;
    }
    public function setUtilisateurId(int $intitule)
    {
        $this->_intituleSignalement= $intitule;
    }
    public function getSignalementId():int
    {
        return $this->_id;
    }
  
   
    }
   