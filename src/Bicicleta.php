<?php
namespace TpFinal;

class Bicicleta extends Transporte
{
    public $boleto = 14.55;
    public $patente;
    public function __construct($patente) {
        $this->patente = $patente;
    }
}
