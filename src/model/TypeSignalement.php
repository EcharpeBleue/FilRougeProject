<?php
declare(strict_types=1);
namespace app\guild\model;
class TypeSignalement {
    private int $_id;
    private string $_intitule;

    public function __construct(int $id,string $intitule){
        $this->_intitule = $intitule;
        $this->_id = $id;
    }

    public function getId():int {
        return $this->_id;
    }
    public function getIntitule():string{
        return $this->_intitule; 
    }

    public function setIntitule(string $intitule):string{
        return $this->_intitule = $intitule; 
    }

    public static function create (TypeSignalement $typeSignalement)
    {
        $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO TYPE_SIGNALEMENT (intitule) values (:intitule);");
        $statement->execute(['intitule'=>$typeSignalement->getIntitule()]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }


    public static function read(int $id):?TypeSignalement{
        $statement=Database::getInstance()->getConnexion()->prepare('select * from TYPE_SIGNALEMENT where id =:id');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        {
             $typeSignalement = new TypeSignalement(id:$row['id'],intitule:$row['intitule']);
            
            return $typeSignalement;
        }
        return null;
    }
    public static function update(TypeSignalement $typeSignalement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE TYPE_SIGNALEMENT set intitule= :intitule WHERE id= :id');
        $statement->execute(['intitule'=>$typeSignalement->getIntitule(),'id'=>$typeSignalement->getId()]);
    }
    public static function delete(TypeSignalement $typeSignalement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM TYPE_SIGNALEMENT WHERE id= :id');
        $statement->execute(['id'=>$typeSignalement->getId()]);
    }

}
