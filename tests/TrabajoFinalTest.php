<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class TrabajoFinalTest extends TestCase {
     public function testTarjeta() {
        $tarjeta = new Tarjeta(41655478);
        $this->assertEquals($tarjeta->saldo(), 0);
    }
}
