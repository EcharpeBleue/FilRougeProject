<?php
declare(strict_types=1);
namespace app\guild\model;

class UtilisateurCollection extends \ArrayObject {
    public function offsetSet($index, $newval):void
    {
        if (!($newval instanceOf Utilisateur)) {
            throw new \InvalidArgumentException("Must be a user");
        }
        parent::offsetSet($index, $newval);
    }
}