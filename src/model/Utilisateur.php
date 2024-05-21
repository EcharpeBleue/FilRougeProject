<?php
declare(strict_types=1);
namespace app\guild\model;

use PHPUnit\Event\EventCollection;

class Utilisateur{
    private int $_id;
    private string $_pseudo;
    private string $_mail;
    private string $_motDePasse;
    private Rang $_rang;
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
    public function getRang():Rang
    {
        return $this->_rang;
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
    public static function creerUtilisateur(Utilisateur $utilisateur):int
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO `UTILISATEUR` (pseudoListeBlanche,mail, motDePasse, idRang) values (:setPseudoListeBlanche, :setMail, :setMotDePasse, :idRang);");
        $statement->execute([
            'setPseudoListeBlanche'=>$utilisateur->getPseudo(), 
            'setMail'=>$utilisateur->getMail(), 
            'setMotDePasse'=>$utilisateur->getMotDePasse(), 
            'idRang'=>$utilisateur->getRang()]);
        $id = (int)Database::getInstance()->getConnexion()->lastInsertId();
        return $id;
    }

    public static function lireUtilisateur(int $id):?Utilisateur
    {
            $statement=Database::getInstance()->getConnexion()->prepare('select * from `UTILISATEUR` WHERE id =:id;');
            $statement->execute(['id'=>$id]);
            if ($row = $statement->fetch()) {
                return new Utilisateur($row['id'],$row['pseudoListeBlanche'],$row['mail'],$row['motDePasse'],$row['idRang']);
            }
            return null;
            
    }
    public static function updateUtilisateur (Utilisateur $utilisateur)
    {
            $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `UTILISATEUR` set  pseudoListeBlanche=:pseudo,mail=:mail, motDePasse=:motDePasse, idRang=:idRang WHERE id=:id;');
            $statement->execute(['pseudo'=>$utilisateur->getPseudo(),'mail'=>$utilisateur->getMail(), 'motDePasse'=>$utilisateur->getMotDePasse(), 'id'=>$utilisateur->getId()]);
    }
    public static function deleteUtilisateur(Utilisateur $utilisateur)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `UTILISATEUR` WHERE id=:id');
        $statement->execute(['id'=>$utilisateur->getId()]);
        
    }
    }
   