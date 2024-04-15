<?php
declare(strict_types=1);
namespace app\guild\model;

use PHPUnit\Event\EventCollection;

class Utilisateur{
    private int $_id;
    private string $_pseudo;
    private string $_mail;
    private string $_motDePasse;
    // organiser
    private EvenementCollection $_evenements;
    // liste des dénonciations faites par l'utiisateur - la balance
    private SignalementCollection $_denonciations;
    // liste des dénonciations faites à l'encontre de l'utilisateur - le balancé
    private SignalementCollection $_denonces;


    public function __construct(int $id = 0, string $pseudo = '', string $mail = "", string $motDePasse, EvenementCollection $evenements, SignalementCollection $denonciations = new SignalementCollection(), SignalementCollection $denonces = new SignalementCollection()) {
        $this->_id = $id;
        $this->_pseudo = $pseudo;
        $this->_mail = $mail;
        $this->_motDePasse = $motDePasse;
        $this->_evenements = $evenements;
        $this->_denonces = $denonces;
        $this->_denonciations = $denonciations;
    
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getPseudo():string
    {
        return $this->_pseudo;
    }
    public function getMail():string
    {
        return $this->_mail;
    }
    public function getMotDePasse():string
    {
        return $this->_motDePasse;
    }

    public function getEvenements():EvenementCollection
    {
        return $this->_evenements;
    }
    public function getDenonciations():SignalementCollection
    {
        return $this->_denonciations;
    }
    public function getDenonces():SignalementCollection
    {
        return $this->_denonces;
    }
   
  

    }
   