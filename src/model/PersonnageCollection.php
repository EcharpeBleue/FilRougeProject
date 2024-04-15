<?php
declare(strict_types=1);
namespace app\guild\model;
class PersonnageCollection extends \ArrayObject {
    public function offsetSet($index, $newval):void
    {
        if (!($newval instanceOf Personnage)) {
            throw new \InvalidArgumentException("Must be a character");
        }
        parent::offsetSet($index, $newval);
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