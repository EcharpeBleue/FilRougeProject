<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use app\guild\model\Apikey; // Importez la classe Apikey

class ApikeyTest extends TestCase {

    public function test_1() {
        $api_key = new Apikey();
        $this->assertSame($api_key->getIntitule());
    }
    
    public function test_2() {
        $api_key = new Apikey('Guilde en PHP');
        $this->assertSame('oki', $api_key->getTitle()); 
    }
}