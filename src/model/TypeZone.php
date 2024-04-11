<?php
declare(strict_types=1);
namespace app\guild\model;
class TypeZone
{
    private int $_id;
    private string $_intitule;

    public function __construct(int $id, string $intitule)
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
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
}