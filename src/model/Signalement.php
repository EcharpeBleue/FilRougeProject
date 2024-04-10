<?php
namespace app\Guilde\model;
class Quizz{
    private int $_idSignalement;
    private string $_intituleSignalement;
    private string $_dateSignalement;
    private UtilisateurCollection $_idUtilisateur;
    public function __construct(int $id = 0, string $intitule = 'Aucun commentaire de signalement', string $date = "00/00/2000") {
        $this->_idSignalement= $id;
        $this->_intituleSignalement = $intitule;
        $this->_dateSignalement = $date;
       
       
    }
    public function getSignalementIntitule():string
    {
        return $this->_intituleSignalement;
    }
    public function setSignalementIntitule(string $intitule)
    {
        $this->_intituleSignalement= $intitule;
    }
    public function getSignalementId():int
    {
        return $this->_id;
    }
    public function addSignalement(int $id):UtilisateurCollection
    {
       
        $liste = new UtilisateurCollection();
        $statement=Database::getInstance()->getConnexion()->prepare('select * from UTILISATEUR where IdUtilisateur=:id;');
        $insertStatement = Database::getInstance()->getConnexion()->prepare('INSERT INTO SIGNALEMENT (intitule, date, idUtilisateur) VALUES (:intitule, :date, :idUtilisateur)');
        $insertStatement->bindParam(':intitule', $intitule);
        $insertStatement->bindParam(':date', $date);
        $insertStatement->bindParam(':idUtilisateur', $id, \PDO::PARAM_INT);
        $insertStatement->execute();
       
    }
   
    

   
    

}