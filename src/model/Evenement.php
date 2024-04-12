<?php
declare(strict_types=1);
namespace app\guild\model;
class Evenement
{
    private int $_id;
    private \DateTime $_date;
    private string $_titre;
    private string $_description;
    private Utilisateur $_organisateur;
    private PersonnageCollection $_participants;
    public function __construct(int $id, \DateTime $date,string $titre, string $description, Utilisateur $organisateur, PersonnageCollection $participants = new PersonnageCollection())
    {
        $this->_id = $id;
        $this->_date = $date;
        $this->_titre = $titre;
        $this->_description = $description;
        $this->_organisateur = $organisateur;
        $this->_participants = $participants;
    }

    public function setDate(int $jour, int $mois, int $annee):void
    {
        $this->_date = \DateTime::createFromFormat('j-n-Y', "$jour-$mois-$annee");
    }
    public function setTitre(string $titre):void
    {
        $this->_titre = $titre;
    }
    public function setDescription(string $description):void
    {
        $this->_description = $description;
    }
    public function getId():int
    {
        return $this->_id;
    }
    public function getDate():\DateTime
    {
        return $this->_date;
    }
    public function getTitre():string
    {
        return $this->_titre;
    }
    public function getDescription():string
    {
        return $this->_description;
    }
    public static function create (Evenement $evenement,Utilisateur $utilisateur):int
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO EVENEMENT (date,intitule,id_2,id_3) values (:setDate,:setTexte,:);");
        $statement->execute(['text'=>$evenement->getTitre(),'numQuiz'=>$utilisateur->getId()]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }
}