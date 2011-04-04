<?php

require_once 'ResistenciaNegativaException.php';
require_once 'ResistenciaLimiteException.php';
require_once 'PoderNegativoException.php';
require_once 'PoderLimiteException.php';
require_once 'AtaqueNegativoException.php';

class Lutador
{

    private $resistencia;
    private $poder;

    public function __construct($resistencia, $poder = 0)
    {
        if($resistencia<0){
            throw new ResistenciaNegativaException('Ooops já perdeu!');
        }
      
        if ($resistencia > 100) {
            throw new ResistenciaLimiteException('Resistência não pode ser superior a 100');
        }
        
        if($poder<0){
            throw new PoderNegativoException('0 é o poder mínimo');
        }
        
        if($poder>100){
            throw new PoderLimiteException('Acima de 100 é muito poder!');
        }
        
        $this->resistencia = $resistencia;
        $this->poder = $poder;
    }

    public function getResistencia()
    {
        return $this->resistencia;
    }

    public function getPoder()
    {
        return $this->poder;
    }
    
    public function atacar(){
        $n = (rand(0,100)/100);
        return ($this->poder * $n);
    }
    
    public function calcularDano($dano){
        $this->resistencia -= $dano;
    }
}

?>
