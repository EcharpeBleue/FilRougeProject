<?php
declare(strict_types=1);
namespace app\guild\model;
//00
class Zone
{
    private int $_id;
    private string $_intitule;
    private string $_rang;
    private TypeZone $_typeZone;

    public function __construct(int $id, string $intitule, string $rang)
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_rang = $rang;
       
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

    public static function create (Zone $zone)
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO `ZONE` (intitule,rang,typeZone) values (:intitule,:rang,:idTypeZone);");
        $statement->execute(['intitule'=>$zone->getIntitule(),'rang'=>$zone->getRang(),'typeZone'=>$zone->getTypeZone()]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }


   

    public static function read(Zone $id):?Zone{
        $statement=Database::getInstance()->getConnexion()->prepare('select * from `ZONE` where id =:id;');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        {
             $zone = new Zone(id:$row['id'],intitule:$row['intitule'],rang:$row['rang']);
            $zone->setTypeZone(TypeZone::read($row['idTypeZone'])); //changement
            return $zone;
        }
        return null;
    }

    
    public static function update(Zone $zone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare
        ('UPDATE `ZONE` set intitule=:intitule, rang=:rang, typeZone =:typeZone WHERE id =:id');
        $statement->execute(['intitule'=>$zone->getIntitule(),'rang'=>$zone->getRang(),'typeZone'=>$zone->getTypeZone(),'id'=>$zone->getId()]);
    }
    public static function delete(Zone $zone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `ZONE` WHERE id =:id');
        $statement->execute(['id'=>$zone->getId()]);
    }

   
}