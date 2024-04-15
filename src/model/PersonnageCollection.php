<?php
declare(strict_types=1);
namespace app\guild\model;
class PersonnageCollection extends \ArrayObject {
    private $_listes = [];

    public function __construct(){
        $this->_listes = [];
    }

    public function offsetSet($index, $newval):void
    {
        if (!($newval instanceOf Personnage)) {
            throw new \InvalidArgumentException("Must be a character");
        }
        parent::offsetSet($index, $newval);
    }

    
    public function add(Personnage $personnage): void {
        $this->_listes[] = $personnage;
    }

    public function getParticipationEvenement(){

    }

//     public static function getParticipantsEvenement(int $numEvenement):PersonnageCollection
//     {
//         $liste = new PersonnageCollection();
        
// // $liste[]=$personnage;

//     }
//     public static function getPersonnageFromUtilitisateur(int $numUtilisateur):PersonnageCollection
//     {

//     }
}