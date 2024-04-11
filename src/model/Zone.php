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
}