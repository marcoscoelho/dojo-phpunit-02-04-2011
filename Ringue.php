<?php

require_once 'Lutador.php';

class Ringue
{ 

    private $azul;
    private $vermelho;
    
    public function __construct(Lutador $vermelho, Lutador $azul)
    {
        $this->vermelho = $vermelho;
        $this->azul = $azul;
    }
    
    public function decidirIniciativa(){
        return (rand(0, 1)) ? 'vermelho' : 'azul';
    }
    
    public function lutarAteMorrer() {
        $v = $this->getVermelho();
        $a = $this->getAzul();
        $primeiro = $this->decidirIniciativa();
        $i = 0;
        do {
            if ($i%2 == 0 && $primeiro == 'vermelho') {
                $ataque = $v->atacar();
                $a->calcularDano($ataque);
            } else {
                $ataque = $a->atacar();
                $v->calcularDano($ataque);
            }
            $i++;
        } while ($v->getResistencia() > 0 && $a->getResistencia() > 0);
        if ($v->getResistencia() == 0) {
            return $v;
        }
        return $a;
    }
    
    public function getAzul() {
        return $this->azul;
    }
    
    public function getVermelho() {
        return $this->vermelho;
    }
    
}

?>
