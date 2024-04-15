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

    public static function delete(Prerequis $id)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM PREREQUIS WHERE id =:id');
        $statement->execute(['id'=>$id->getId()]);
    }

}