<?php
declare(strict_types=1);
namespace app\guild\model;

class ZoneCollection extends \ArrayObject {
    public function offsetSet($index, $newval):void
    {
        if (!($newval instanceOf Zone)) {
            throw new \InvalidArgumentException("Must be a zone");
        }
        parent::offsetSet($index, $newval);
    }
}