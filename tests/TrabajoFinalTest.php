<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {
     
     public function testTarjeta() {
          $tarjeta = new Tarjeta(41655478);
          $this->assertEquals($tarjeta->saldo(), 0);
          
          $tarjeta->recargar(50);
          $this->assertEquals($tarjeta->saldo(), 50);
          
          $saldo_actual = $tarjeta->saldo();
          $tarjeta->recargar(332);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual + 388));
          
          $colectivo_144 = new Colectivo( "144N" );
          $saldo_actual = $tarjeta->saldo();
          $tarjeta->pagar($colectivo_144);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - $colectivo_144->boleto() ) );
    }
}
