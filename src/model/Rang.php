<?php
declare(strict_types=1);
namespace app\guild\model;
class Rang{
    private int $_id;
    private string $_intitule;
    private string $_rang;
    private UtilisateurCollection $_utilisateurs;
    private EvenementCollection $_evenements;
    public function __construct(int $id = 0, string $rang = 'Nouveau Membre', string $intitule = 'noob', UtilisateurCollection $utilisateurs = new UtilisateurCollection(), EvenementCollection $evenements = new EvenementCollection()) {
        $this->_id= $id;
        $this->_intitule = $intitule;
        $this->_rang = $rang;  
        $this->_utilisateurs = $utilisateurs;
        $this->_evenements = $evenements;
        
    }

    public function getId():int
    {
        return $this->_id;
    }

    public function getUtilisateurs():UtilisateurCollection
    {
        return $this->_utilisateurs;
    }
    public function getEvenements():EvenementCollection
    {
        return $this->_evenements;
    }
    public function addEvenement(Evenement $evenement)
    {
        $this->_evenements[] = $evenement;
    }
    public function addUtilisateur(Utilisateur $utilisateur)
    {
        $this->_utilisateurs[] = $utilisateur;
    }
    public function getIntitule():string
    {
        return $this->_intitule;
    }
    public function setIntitule(string $intitule)
    {
        $this->_intitule= $intitule;
    }
    public function getRang():string
    {
        return $this->_rang;
    }
    public function setRang(string $rang)
    {
        $this->_rang= $rang;
    }
    public static function delete(Rang $id)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `RANG` WHERE id =:id');
        $statement->execute(['id'=>$id->getId()]);
    }
    public static function read(int $id): ?Rang
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `RANG` WHERE id = :id');
        $statement->execute(['id' => $id]);
    
        if ($row = $statement->fetch()) {
            $rang = new Rang(id: $row['id']);
            return $rang;
        }

    }
    public function creerRang(Rang $rang):int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO `RANG` (intitule,rang) values (:setIntitule, :setRang);");
        $statement->execute(['setIntitule'=>$rang->getIntitule(), 'setRang'=>$rang->getIntitule()]);
        $id = (int)Database::getInstance()->getConnexion()->lastInsertId();
        return $id;
    }
    public static function update(Rang $rang)
    {
        $statement = Database::getInstance()->getConnexion()->prepare
        ('UPDATE `RANG` set intitule=:intitule, rang=:rang WHERE id =:id');
        $statement->execute(['intitule'=>$rang->getIntitule(),'rang'=>$rang->getRang(),'id'=>$rang->getId()]);
    }
}