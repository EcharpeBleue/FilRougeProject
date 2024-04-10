<?php
declare(strict_types=1);
class Evenement
{
    private int $_id;
    private DateTime $_date;

    public function __construct(int $id, DateTime $date)
    {
        $this->_id = $id;
        $this->_date = $date;
    }

    public function setDate(int $jour, int $mois, int $annee):void
    {
        $this->_date = DateTime::createFromFormat('j-n-Y', "$jour-$mois-$annee");
    }

    public function getId():int
    {
        return $this->_id;
    }
    public function getDate():DateTime
    {
        return $this->_date;
    }
}