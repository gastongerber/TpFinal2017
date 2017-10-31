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
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - $colectivo_144->boleto ) );
          
          $saldo_actual = $tarjeta->saldo();
          $tarjeta->pagar($colectivo_144);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - $colectivo_144->boleto ) );
          
          $saldo_actual = $tarjeta->saldo();
          $colectivo_113 = new Colectivo("113");
          $tarjeta->pagar($colectivo_113);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - ($colectivo_113->boleto /3) ) );
          
          $saldo_actual = $tarjeta->saldo();
          $tarjeta->pagar($colectivo_113);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - $colectivo_113->boleto ) );
          
          $saldo_actual = $tarjeta->saldo();
          $colectivo_115 = new Colectivo("115");
          $tarjeta->pagar($colectivo_115);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - ($colectivo_115->boleto /3) ) );
          
          $saldo_actual = $tarjeta->saldo();
          $tarjeta->pagar($colectivo_115);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - $colectivo_115->boleto ) );
          
          $saldo_actual = $tarjeta->saldo();
          $bici1 = new Bicicleta("11111");
          $tarjeta->pagar($bici1);
          $this->assertEquals($tarjeta->saldo(), ($saldo_actual - $bici1->boleto) );
          
          $saldo_actual = $tarjeta->saldo();
          $bici2 = new Bicicleta("22222");
          $bici3 = new Bicicleta("33333");
          $bici4 = new Bicicleta("44444");
          $tarjeta->pagar($bici2);
          $tarjeta->pagar($bici3);
          $tarjeta->pagar($bici4);
          $this->assertEquals($tarjeta->saldo(), $saldo_actual );
    }
}
