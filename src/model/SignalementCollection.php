<?php
declare(strict_types=1);
namespace app\guild\model;

class SignalementCollection extends \ArrayObject {
    public function offsetSet($index, $newval):void
    {
        if (!($newval instanceOf Signalement)) {
            throw new \InvalidArgumentException("Must be a report");
        }
        parent::offsetSet($index, $newval);
    }
}