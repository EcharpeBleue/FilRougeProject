<?php
declare(strict_types=1);
namespace app\guild\model;
class Zone
{
    private int $_id;
    private string $_intitule;
    private string $_rang;
    private TypeZone $_typeZone;

    public function __construct(int $id, string $intitule, string $rang, TypeZone $typeZone)
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_rang = $rang;
        $this->_typeZone = $typeZone;
    }

    public function setIntitule(string $intitule):void
    {
        $this->_intitule = $intitule;
    }
    public function setRang(string $rang):void
    {
        $this->_rang = $rang;
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getIntitule():string
    {
        return $this->_intitule;
    }
    public function getRang():string
    {
        return $this->_rang;
    }
    // get et set²
    public function getTypeZone():TypeZone
    {
        return $this->_typeZone;
    }
    public function setTypeZone(TypeZone $typeZone):void
    {
        $this->_typeZone = $typeZone;
    }




     
    public static function create (Signalement $signalement)
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO SIGNALEMENT (intitule,Sdate,idUtilisateur,idTypeSignalement) values (:intitule,:Sdate,:idUtilisateur:idTypeSignalement);");
        $statement->execute(['intitule'=>$signalement->getIntitule(),'Sdate'=>$signalement->getDateSignalement(),'idUtilisateur'=>$signalement->getUtilisateur()->getId(),'idTypeSignalement'=>$signalement->getType(), ]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }


    public static function createPlus (Signalement $signalement,TypeSignalement $typeSignalement)
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO SIGNALEMENT (intitule,Sdate,idUtilisateur,idTypeSignalement) values (:intitule,:Sdate,:idUtilisateur:idTypeSignalement);");
        $statement->execute(['intitule'=>$signalement->getIntitule(),'Sdate'=>$signalement->getDateSignalement(),'idUtilisateur'=>$signalement->getUtilisateurs(),'idTypeSignalement'=>$signalement->getType(), ]);
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
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE SIGNALEMENT set intitule=:intitule, Sdate:date, idUtilisateur =:idUtilisateur WHERE id =:id');
        $statement->execute(['intitule'=>$signalement->getIntitule(),'idUtilisateur'=>$signalement->getUtilisateur()->getId(),'id'=>$signalement->getId()]);
    }
    public static function delete(Signalement $signalement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM SIGNALEMENT WHERE id =:id');
        $statement->execute(['id'=>$signalement->getId()]);
    }

   
}