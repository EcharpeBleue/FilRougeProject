<?php
declare(strict_types=1);



use PHPUnit\Framework\TestCase;
use app\FilRougeProject\model\Api_key; // Importez la classe Api_key

class Api_keyTest extends TestCase {

    public function test_1() {
        $api_key = new Api_key();
        $this->assertSame($api_key->getIntitule());
    }
    
    public function test_2() {
        $api_key = new Api_key('Guilde en PHP');
        $this->assertSame('oki', $api_key->getTitle()); 
    }
}