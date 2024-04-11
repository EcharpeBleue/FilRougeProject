<?php
declare(strict_types=1);
namespace app\guild\model;
class Utilisateur{
    private int $_idUtilisateur;
    private string $_pseudo;
    private string $_mail;
    private string $_motDePasse;

    public function __construct(int $id = 0, string $pseudo = '', string $mail = "", string $motDePasse) {
        $this->_idUtilisateur = $id;
        $this->_pseudo = $pseudo;
        $this->_mail = $mail;
        $this->_motDePasse = $motDePasse;
       
       
    }
    public function getId():int
    {
        return $this->_idUtilisateur;
    }

    public function getSignalementId():int
    {
        return $this->_id;
    }
  
   
    }
   