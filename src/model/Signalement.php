<?php
declare(strict_types=1);
namespace app\guild\model;

use DateTime;

class Signalement{
    private int $_id;
    private string $_intitule;
    private DateTime $_dateSignalement;
    private UtilisateurCollection $_utilisateurs;
    private Utilisateur $_utilisateur;
    public function __construct(int $id = 0, string $intitule = 'Aucun commentaire de signalement', DateTime $dateSignalement =  new DateTime('now'), Utilisateur $utilisateur, UtilisateurCollection $utilisateurs = new UtilisateurCollection()) {
        $this->_id= $id;
        $this->_intitule = $intitule;
        $this->_dateSignalement = $dateSignalement;
        $this->_utilisateur = $utilisateur;
        $this->_utilisateurs;   
    }
    public function getIntitule():string
    {
        return $this->_intitule;
    }
    public function setIntitule(string $intitule)
    {
        $this->_intitule= $intitule;
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getDateSignalement():DateTime
    {
        return $this->_dateSignalement;
    }
    public function addUtilisateur(Utilisateur $utilisateur)
    {
        $this->_utilisateurs[]= $utilisateur;
    }
    public function getUtilisateur():Utilisateur
    {
        return $this->_utilisateur;
    }
    public function getUtilisateurs():UtilisateurCollection
    {
        return $this->_utilisateurs;
    }
    // public function addSignalement(int $id):UtilisateurCollection
    // {
       
    //     $liste = new UtilisateurCollection();
    //     $statement=Database::getInstance()->getConnexion()->prepare('select * from UTILISATEUR where IdUtilisateur=:id;');
    //     $insertStatement = Database::getInstance()->getConnexion()->prepare('INSERT INTO SIGNALEMENT (intitule, date, idUtilisateur) VALUES (:intitule, :date, :idUtilisateur)');
    //     $insertStatement->bindParam(':intitule', $intitule);
    //     $insertStatement->bindParam(':date', $date);
    //     $insertStatement->bindParam(':idUtilisateur', $id, \PDO::PARAM_INT);
    //     $insertStatement->execute();
       
    // }
   
    

   
    

}