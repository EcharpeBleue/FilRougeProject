<?php
declare(strict_types=1);
namespace app\guild\model;
class Prerequis
{
    private int $_id;
    private string $_equipement;
    // ^^ probablement remplacer le type par Equipement, peut être implémenter la classe
    private int $_niveauMin;
    private int $_niveauMax;

    public function __construct(int $id, string $equipement, int $niveauMin, int $niveauMax)
    {
        $this->_id = $id;
        $this->_equipement = $equipement;
        $this->_niveauMin = $niveauMin;
        $this->_niveauMax = $niveauMax;
    }

    public function setEquipement(string $equipement):void
    {
        $this->_equipement = $equipement;
    }
    public function setNiveauMin(int $niveauMin):void
    {
        $this->_niveauMin = $niveauMin;
    }
    public function setNiveauMax(int $niveauMax):void
    {
        $this->_niveauMax = $niveauMax;
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getEquipement():string
    {
        return $this->_equipement;
    }
    public function getNiveauMin():int
    {
        return $this->_niveauMin;
    }
    public function getNiveauMax():int
    {
        return $this->_niveauMax;
    }


    
    public static function update(Prerequis $Prerequis)
{
    $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `PREREQUIS` set equipement=:equipement, niveauMin=:niveaumin, niveauMax=:niveauMax WHERE id =:id');
    $statement->execute(['equipement'=>$Prerequis->getEquipement() ,'niveauMin'=>$Prerequis->getNiveauMin(),'niveauMax'=>$Prerequis->getNiveauMax()]);
}

  public static function read(int $id): ?Prerequis
  {
      $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `PREREQUIS` WHERE id = :id');
      $statement->execute(['id' => $id]);
  
      if ($row = $statement->fetch()) {
          $prerequis = new Prerequis(id: $row['id'], equipement: $row['equipement'], niveauMin: $row['niveauMin'],niveauMax:$row["niveauMax"]);
          return $prerequis;
      }
  
      return null;
  }
  
  public static function create (Evenement $evenement,Prerequis $prerequis)
  {
      $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO `PREREQUIS` (id,equipement,niveauMin,niveauMax) values (:id,:equipement,:niveauMin,:niveauMax);");
      $statement->execute(['id'=>$prerequis->getId(),'niveauMin'=>$prerequis->getNiveauMin(),'equipement'=>$prerequis->getEquipement(),'niveauMax'=>$prerequis->getNiveauMax()]);
      return Database::getInstance()->getConnexion()->lastInsertId();
  }

}