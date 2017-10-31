<?php
namespace TpFinal;

class Viaje
{
    protected $transporte;
    protected $fecha;
    protected $fechaf;
    public function __construct($trans, $f) {
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
