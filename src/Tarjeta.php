<?php
	protected $saldo, $viajeshechos, $viajes_plus;
class Tarjeta {	
public function saldo() {
	return $this->saldo;
	}
public function mostrarviajeshechos() {
		return $this->viajeshechos;
	}
public function pagar( Transporte $transporte, $tipo_boleto ) {
		
	}
public function recargar(){

}

}
