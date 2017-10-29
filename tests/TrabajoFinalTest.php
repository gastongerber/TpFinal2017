<?php

use PHPUnit\Framework\TestCase;

class TrabajoFinalTest extends TestCase {
     public function TestTarjeta() {
        $tarjeta = new Tarjeta(41655478);
        $this->assertEquals($tarjeta->saldo(), 0);
    }
}
