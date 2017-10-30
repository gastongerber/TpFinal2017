<?php

namespace TpFinal;
	
class Tarjeta {	
	
protected $saldoactual, $viajeshechos, $dni;

public function __construct( $dni ) {
		$this->saldoactual = 0;
		$this->dni = $dni;
	}

public function saldo() {
		return $this->saldoactual;
	}
public function mostrarviajeshechos() {
		return $this->viajeshechos;
	}
public function pagar( Transporte $transporte) {
	if ($transporte instanceof Bicicleta){
        	$viajes = $this->mostrarviajeshechos();
        	$fecha = new DateTime();
        	$fechaf = $fecha->getTimestamp();
		$condicion = 0;
       		foreach( $viajes as $viaje ) { 
	if ( $viaje->darTransporte() instanceof Bicicleta && ($viaje->darFecha()->getTimestamp()+ 86400 ) <= $fechaf) {
				$condicion = 1;
				break;
				}
			}
			if ( $condicion == 0 ) {
				$fh=new DateTime();
				$Viaje = new Viaje ($transporte, $fh);
				$this->viajeshechos[] = $Viaje;
				$this->saldoactual = $this->saldoactual - $transporte->boleto;
			} else {
				$fh=new DateTime();
				$Viaje = new Viaje ($transporte, $fh);
				$this->viajeshechos[] = $Viaje;
			}
		} else {
			$viajes = $this->mostrarviajeshechos();
			$ultimo_viaje = end( $viajes );
			$fecha = new DateTime();
        		$fechaf = $fecha->getTimestamp();
			if ( false == $ultimo_viaje ) {
				$fh=new DateTime();
				$Viaje = new Viaje ($transporte, $fh);
				$this->viajeshechos[] = $Viaje;
				$this->saldoactual = $this->saldoactual - $transporte->boleto;
			} elseif ( $ultimo_viaje->darTransporte() instanceof Colectivo && $ultimo_viaje->darTransporte()->linea != $transporte->linea && ($ultimo_viaje->darFecha()->getTimestamp()+ 3600 ) <= $fechaf ) {
				$fh=new DateTime();
				$Viaje = new Viaje ($transporte, $fh);
				$this->viajeshechos[] = $Viaje;
				$this->saldoactual = $this->saldoactual - ($transporte->boleto/3);
				} else {
					$fh=new DateTime();
					$Viaje = new Viaje ($transporte, $fh);
					$this->viajeshechos[] = $Viaje;
					$this->saldoactual = $this->saldoactual - $transporte->boleto;
				}
            
        }
	}
public function recargar($monto){
	if($monto == 332) {
        	$this->saldoactual += 388;
        } else {
        	if($monto == 500) {
                	$this->saldoactual += 652;          
		} else {
            		$this->saldoactual += $monto;
		}
	}
}
}




