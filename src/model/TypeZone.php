<?php
declare(strict_types=1);
namespace app\guild\model;
class TypeZone
{
    private int $_id;
    private string $_intitule;
    private ZoneCollection $_zones;

    public function __construct(int $id, string $intitule, ZoneCollection $zone = new ZoneCollection())
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_zones = $zone;
    }
    public function setIntitule(string $intitule):void
    {
        $this->_intitule = $intitule;
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getIntitule():string
    {
        return $this->_intitule;
    }
    public function getZones():ZoneCollection
    {
        return $this->_zones;
    }
    public function addZone(Zone $zone):void
    {
         $this->_zones[]= $zone;
    }

   
    public static function create(ZoneCollection $zone ,TypeZone $typeZone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO `TYPE_ZONE` (id, intitule, zone) VALUES (:id, :intitule, :zone);");
        $statement->execute(['id' => $typeZone->getId(),'intitule'=>$typeZone->getIntitule(),"zone"=>$typeZone->getZones()]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }
    
    public static function read(int $id): ?TypeZone
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `TYPE_ZONE` WHERE id = :id;');
        $statement->execute(['id' => $id]);

        if ($row = $statement->fetch()) {
        
            return new TypeZone(id: $row['id'], intitule: $row['intitule'], zone: $row['zone']);
        }
        return null;
    }
    
    public static function update(TypeZone $typeZone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `TYPE_ZONE` SET id = :id, intitule = :intitule, zone = :zone WHERE id = :id');
        $statement->execute(['id' => $typeZone->getId(), 'intitule' => $typeZone->getIntitule(), "zone"=>$typeZone->getZones()]);
    }
    
    public static function delete(TypeZone $typeZone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `TYPE_ZONE` WHERE id = :id');
        $statement->execute(['id' => $typeZone->getId()]);
    }
    


}