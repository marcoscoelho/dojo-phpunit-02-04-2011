<?php

//require_once dirname(__FILE__) . '/../Lutador.php';
require_once dirname(__FILE__) . '/../Ringue.php';

class RingueTest extends PHPUnit_Framework_TestCase
{

    private $ringue;

    public function setUp()
    {
        $this->ringue = new Ringue(new Lutador(100, 50), new Lutador(100, 60));
    }

    public function testDecidirIniciativa()
    {
        $this->assertContains($this->ringue->decidirIniciativa(), array('azul','vermelho'));
    }

    public function testLutarAteMorrer() {
        $this->assertInstanceOf('Lutador', $this->ringue->lutarAteMorrer());
    }
    
    public function testResultadoValido() {
        $this->ringue->lutarAteMorrer();
        $azul = $this->ringue->getAzul();
        $vermelho = $this->ringue->getVermelho();
        
        $a = $azul->getResistencia() > 0 && $vermelho->getResistencia() <= 0;
        $v = $vermelho->getResistencia() > 0 && $azul->getResistencia() <= 0;
        
        $this->assertTrue($a || $v);
    }
    
}

?>
