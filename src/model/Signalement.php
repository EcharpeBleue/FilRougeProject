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
    public function setUtilisateur(Utilisateur $utilisateur)
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
   
    public static function create (Signalement $intitule,Signalement $date,Utilisateur $utilisateur,TypeSignalement $typeSignalement)
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO SIGNALEMENT (intitule,Sdate,idUtilisateur,idTypeSignalement) values (:intitule,:Sdate,:idUtilisateur:idTypeSignalement);");
        $statement->execute(['intitule'=>$intitule->getIntitule(),'Sdate'=>$date->getDateSignalement(),'idUtilisateur'=>$utilisateur->getId(),'idTypeSignalement'=>$utilisateur->getId(), ]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(Signalement $id):?Signalement{
        $statement=Database::getInstance()->getConnexion()->prepare('select * from SIGNALEMENT where id =:id;');
        $statement->execute(['id'=>$id]);
        // if ($row = $statement->fetch())
        // {
        //     // $signalement = new Signalement(id:$row['id'],intitule:$row['intitule']);
        //     $signalement->setUtilisateur(Utilisateur::read($row['id_2']));
        //     return $signalement;
        // }
        return null;
    }
    public static function update(Signalement $signalement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE SIGNALEMET set intitule=:intitule, Sdate:date, idUtilisateur =:idUtilisateur WHERE id =:id');
        $statement->execute(['text'=>$signalement->getIntitule(),'idUtilisateur'=>$signalement->getUtilisateur()->getId(),'id'=>$signalement->getId()]);
    }
    public static function delete(Signalement $signalement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM SIGNALEMENT WHERE id =:id');
        $statement->execute(['id'=>$signalement->getId()]);
    }

   
    

}