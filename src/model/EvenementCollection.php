<?php
declare(strict_types=1);
namespace app\guild\model;

class EvenementCollection extends \ArrayObject {
    public function offsetSet($index, $newval):void
    {
        if (!($newval instanceOf Evenement)) {
            throw new \InvalidArgumentException("Must be an event");
        }
        parent::offsetSet($index, $newval);
    }
    
}