<?php
	
class Tarjeta {	
	
protected $saldoactual, $viajeshechos, $dni;

public function __construct( $dni ) {
		$this->dni = $dni;
	}

public function saldo() {
		return $this->saldoactual;
	}
public function mostrarviajeshechos() {
		return $this->viajeshechos;
	}
public function pagar( Transporte $transporte) {
		$fh=new DateTime();
		$Viaje = new Viaje ($transporte, $fh);
		$this->viajeshechos[] = $Viaje;
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
    
    protected $transporte, $fecha;

    public function __construct ($trans,$f) {
        $this->transporte=$trans;
        $this->fecha=$f;
    }
    
    public function darTransporte() {
          return $this->transporte;
    }
    public function darFecha() {
          return $this->fecha;
    }
}
