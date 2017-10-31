<?php
namespace TpFinal;

class Colectivo extends Transporte
{
    public $boleto = 9.7;
    public $linea;
    public function __construct($linea) {
        $this->linea = $linea;
    }
}


