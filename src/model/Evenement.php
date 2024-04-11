<?php
declare(strict_types=1);
namespace app\guild\model;
class Evenement
{
    private int $_id;
    private \DateTime $_date;
/** ajouter un champ titre? description? */
    private Utilisateur $_organisateur;
    private PersonnageCollection $_participants;
    public function __construct(int $id, \DateTime $date,Utilisateur $organisateur, PersonnageCollection $participants = new PersonnageCollection())
    {
        $this->_id = $id;
        $this->_date = $date;
        $this->_organisateur = $organisateur;
        $this->_participants = $participants;
    }

    public function setDate(int $jour, int $mois, int $annee):void
    {
        $this->_date = \DateTime::createFromFormat('j-n-Y', "$jour-$mois-$annee");
    }

    public function getId():int
    {
        return $this->_id;
    }
    public function getDate():\DateTime
    {
        return $this->_date;
    }
    
}