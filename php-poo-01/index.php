<?php 
/* 
 * EXERCICIO UTILIZANDO ORIENTACAO A OBJETOS E CLASSE ABSTRATA 
 */
abstract class Banco {
    protected $saldo;
    protected $limiteSaque;
    protected $juros;

    //set
    public function setSaldo($valor){
        $this->saldo = $valor;
    }
    public function setLimiteSaque($valor){
        $this->limiteSaque = $valor;
    }
    public function setJuros($valor){
        $this->juros = $valor;
    }

    //get
    public function getSaldo(){
        return $this->saldo;
    }
    public function getLimiteSaque(){
        return $this->limiteSaque;
    }
    public function getJuros(){
        return $this->juros;
    }

    abstract protected function Sacar($valor);
    abstract protected function Depositar($valor);
}

class Itau extends Banco {
    
    public function Sacar($valor){
        $this->saldo -= $valor;
    }

    public function Depositar ($valor){
        $this->saldo += $valor;
    }

}


$banco = new Itau;

$banco->setSaldo(1000);
echo "<br />Saldo atual de {$banco->getSaldo()}";

$valor=300;
$banco->Sacar($valor);
echo "<br />Valor sacado de  {$valor}, saldo atual de {$banco->getSaldo()}";

$valor=450;
$banco->Depositar($valor);
echo "<br />Valor depositado de {$valor}, saldo atual de {$banco->getSaldo()}";