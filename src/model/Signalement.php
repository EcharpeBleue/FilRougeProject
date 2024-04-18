<?php
declare(strict_types=1);
namespace app\guild\model;

use DateTime;

class Signalement{
    private int $_id;
    private string $_intitule;
    private DateTime $_Sdate;
    private UtilisateurCollection $_utilisateurs;
    private Utilisateur $_utilisateur;
    private TypeSignalement $_typeSignalement;
    public function __construct(int $id = 0, string $intitule = 'Aucun commentaire de signalement', DateTime $Sdate =  new DateTime('now'), Utilisateur $utilisateur, UtilisateurCollection $utilisateurs = new UtilisateurCollection(), TypeSignalement $typeSignalement = new TypeSignalement(1, 'harcellement')) {
        $this->_id= $id;
        $this->_intitule = $intitule;
        $this->_Sdate = $Sdate;
        $this->_utilisateur = $utilisateur;
        $this->_utilisateurs;
        $this->_typeSignalement = $typeSignalement;   
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
        return $this->_Sdate;
    }

    public function getType():TypeSignalement
    {
        return $this->_typeSignalement;
    }

    public function setType(TypeSignalement $typeSignalement)
    {
        $this->_typeSignalement[]= $typeSignalement;
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
   
    public static function create (Signalement $signalement)
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO `SIGNALEMENT` (intitule,Sdate,idUtilisateur,idTypeSignalement) values (:intitule,:Sdate,:idUtilisateur,:idTypeSignalement);");
        $statement->execute(['intitule'=>$signalement->getIntitule(),'Sdate'=>$signalement->getDateSignalement(),'idUtilisateur'=>$signalement->getUtilisateur()->getId(),'idTypeSignalement'=>$signalement->getType(), ]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }


    public static function read(Signalement $id):?Signalement{
        $statement=Database::getInstance()->getConnexion()->prepare('select * from `SIGNALEMENT` where id =:id;');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        {
             $signalement = new Signalement(id:$row['id'],intitule:$row['intitule'],Sdate:$row['Sdate'],utilisateur:$row['idUtilisateur']);
            $signalement->setType(TypeSignalement::read($row['idTypeSignalement']));
            return $signalement;
        }
        return null;
    }
    public static function update(Signalement $signalement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `SIGNALEMENT` set intitule= :intitule, Sdate= :Sdate, idUtilisateur= :idUtilisateur WHERE id= :id');
        $statement->execute(['intitule'=>$signalement->getIntitule(),'Sdate'=>$signalement->getDateSignalement(),'idUtilisateur'=>$signalement->getUtilisateur()->getId(),'id'=>$signalement->getId()]);
    }
    public static function delete(Signalement $signalement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `SIGNALEMENT` WHERE id= :id');
        $statement->execute(['id'=>$signalement->getId()]);
    }
}