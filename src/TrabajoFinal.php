<?php
	
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
		}
	}
public function recargar($monto){
	   if($monto == 332) {
            $this->saldoactual += 388;
        }else{
            if($monto == 500) {
                $this->saldoactual += 652;          
            }
        }else{
            $this->saldoactual += $monto;
        }
}

}

abstract class Transporte {
	public $boleto;
}
class Bicicleta extends Transporte {
	public $boleto = 14.55;
	public $patente;
	public function __construct( $patente ) {
		$this->patente = $patente;
	}
}

class Colectivo extends Transporte {
	public $boleto = 9.7;
	public $linea;
	public function __construct( $linea ) {
		$this->linea = $linea;
	}
}

class Viaje {
    
    protected $transporte, $fecha, $fechaf;

    public function __construct ($trans,$f) {
        $this->transporte=$trans;
        $this->fecha=$f;
	$this->fechaf=$f->format('Y-m-d-H-i-s');
    }
    
    public function darTransporte() {
          return $this->transporte;
    }
    public function darFecha() {
          return $this->fecha;
    }
}
