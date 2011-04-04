<?php

require_once dirname(__FILE__) . '/../Lutador.php';

class LutadorTest extends PHPUnit_Framework_TestCase
{

    public function testConstrutor()
    {
        $lutador = new Lutador(100, 0);
        $this->assertEquals(100, $lutador->getResistencia());
    }
    
    public function testResistenciaNegativa() {
     $this->setExpectedException('ResistenciaNegativaException');
     $lutador = new Lutador(-5);
    }
    
    public function testeResistenciaLimite(){
     $this->setExpectedException('ResistenciaLimiteException');
     $lutador = new Lutador(120);
       
    }
    
    public function testConstrutorPoder()
    {
        $lutador = new Lutador(100, 1);
        $this->assertEquals(1, $lutador->getPoder());
    }
    
    
    public function testPoderNegativo() {
     $this->setExpectedException('PoderNegativoException');
     $lutador = new Lutador(100, -5);
    }
    
     
    public function testPoderLimite() {
     $this->setExpectedException('PoderLimiteException');
     $lutador = new Lutador(100, 105);
    }
    
    public function testAtacarMaiorIgualZero(){
        $lutador = new Lutador(100, 90);
        $this->assertGreaterThanOrEqual(0, $lutador->atacar());
    }

    public function testAtacarLimite(){
        $lutador = new Lutador(100, 90);
        $this->assertLessThanOrEqual($lutador->getPoder(), $lutador->atacar());
    }
    
    public function testarDano(){
        $lutador =  new Lutador(100,32);
        $lutador->calcularDano(50);
        $this->assertEquals(50,$lutador->getResistencia());
    }

}

?>
