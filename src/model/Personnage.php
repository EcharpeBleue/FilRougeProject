<?php
declare(strict_types=1);
namespace app\guild\model;
Class Personnage {
    private int $_id;
    private EvenementCollection $_evenements;
    private int $_niveau;
    private string $_equipement;
    private Utilisateur $_utilisateur;

    public function __construct(int $niveau, string $equipement, Utilisateur $utilisateur,int $id =0 ,EvenementCollection $evenements = new EvenementCollection(),){
        $this->_niveau = $niveau;
        $this->_equipement = $equipement;
        $this->_id = $id;
        $this->_evenements = $evenements;
        $this->_utilisateur = $utilisateur;
    }

    public function getId():int {
        return $this->_id;
    }

    public function getNiveau():int {
        return $this->_niveau;
    }
    
    public function getEquipement():string {
        return $this->_equipement;
    }

    public function setNiveau($niveau):void {
       $this->_niveau = $niveau;

    }
    
    public function setEquipement($equipement):void {
        $this->_equipement = $equipement;
    }

    public function getEvenements():EvenementCollection {
       
        return $this->_evenements;
    }
    public function addEvenement(Evenement $evenement)
    {
        $this->_evenements[]=$evenement;
    }


    public static function update(Personnage $personnage)
{
    $statement = Database::getInstance()->getConnexion()->prepare('UPDATE `PERSONNAGE` set niveau=:niveau, equipement=:equipement WHERE id =:id');
    $statement->execute(['niveau'=>$personnage->getNiveau(), 'equipement'=>$personnage->getEquipement(),'id'=>$personnage->getId()]);
}

    public static function delete(Personnage $personnage)
{
    $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM `PERSONNAGE` WHERE id =:id');
    $statement->execute(['id'=>$personnage->getId()]);
} 
    
    public function demander(Evenement $evenement){ 
    $this->_evenements[] = $evenement;
  }




  public static function read(int $id): ?Personnage
  {
      $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM `PERSONNAGE` WHERE id = :id');
      $statement->execute(['id' => $id]);
  
      if ($row = $statement->fetch()) {
        $utilisateur = Utilisateur::lireUtilisateur( $row['idUtilisateur']);
          $personnage = new Personnage(id: $row['id'], niveau: $row['niveau'], equipement: $row['equipement'],utilisateur:$utilisateur); 

          return $personnage;
      }
  
      return null;
  }
  
  public static function create(Utilisateur $utilisateur, Personnage $personnage) {
    $conn = Database::getInstance()->getConnexion();
    $statement = $conn->prepare("INSERT INTO `PERSONNAGE` (niveau, equipement, idUtilisateur) VALUES (:niveau, :equipement, :idUtilisateur)");
    
    $statement->execute(['niveau' => $personnage->getNiveau(),'equipement' => $personnage->getEquipement(),'idUtilisateur' => $utilisateur->getId()
    ]);

    return $conn->lastInsertId();
}


  
 
}



