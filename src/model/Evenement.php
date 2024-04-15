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
    private Prerequis $_prerequis;
    private Zone $_zone;
    private PersonnageCollection $_participants;
    public function __construct(int $id, \DateTime $date,string $titre, string $description, Utilisateur $organisateur, Prerequis $prerequis =null, Zone $zone= null, PersonnageCollection $participants = new PersonnageCollection())
    {
        $this->_id = $id;
        $this->_date = $date;
        $this->_titre = $titre;
        $this->_description = $description;
        $this->_organisateur = $organisateur;
        $this->_prerequis = $prerequis;
        $this->_zone = $zone;
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
    public function getOrganisateur():Utilisateur
    {
        return $this->_organisateur;
    }
    public function getPrerequis():Prerequis
    {
        return $this->_prerequis;
    }
    public function getZone():Zone
    {
        return $this->_zone;
    }
    // public function getParticipants():PersonnageCollection
    // {
    //     return $this->_participants = PersonnageCollection::getParticipantsEvenement($this->getId());
    // }
    public static function creerEvenement (Evenement $evenement):int
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO `EVENEMENT` (Edate,intitule,idUtilisateur) values (:setDate,:setTexte,:numUtilisateur);");
        $statement->execute(['setDate'=>$evenement->getDate(),'setTexte'=>$evenement->getTitre() . $evenement->getDescription(),'numUtilisateur'=>$evenement->getOrganisateur()->getId()]);
        $id = (int)Database::getInstance()->getConnexion()->lastInsertId();

        if ($evenement->getPrerequis()!=null)
        {
            $statement=Database::getInstance()->getConnexion()->prepare("UPDATE `EVENEMENT` set numPrerequis=:numPrerequis WHERE id =:id);");
        $statement->execute(['id'>=$id,'numPrerequis'=>$evenement->getPrerequis()->getId()]);

        }
        if ($evenement->getZone()!=null)
        {
            $statement=Database::getInstance()->getConnexion()->prepare("UPDATE `EVENEMENT` set numZone=:numZone WHERE id =:id);");
            $statement->execute(['id'>=$id,'numZone'=>$evenement->getZone()->getId()]);
        }
        return $id;
    }
    public static function lireEvenement(int $id)
    {
            $statement=Database::getInstance()->getConnexion()->prepare('select * from `EVENEMENT` WHERE id =:id;');
            $statement->execute(['id'=>$id]);
            
    }
    public static function updateEvenement (Evenement $evenement)
    {
            $statement = Database::getInstance()->getConnexion()->prepare('UPDATE EVENEMENT set Edate=:Edate, intitule=:intitule  WHERE id =:id');
            $statement->execute(['text'=>$evenement->getTitre(),'numQuiz'=>$evenement->getQuiz()->getId(),'id'=>$evenement->getId()]);
    }
}