<?php
    include_once("veiculo.class.php");
    class Carro extends Veiculo{
        private $qtdPortas = 0;

        public function getQtdPortas(){
            return $this->qtdPortas;
        }

        public function setQtdPortas($qtdPortas){
            $this->qtdPortas = $qtdPortas;
        }

        public function __construct($marca, $modelo, $ano, $qtdPortas){
            parent::__construct($marca, $modelo, $ano);
            $this->qtdPortas = $qtdPortas;
        }

        public function exibirDados(){
            echo "Marca: " . $this->getMarca() . "\nModelo: " . $this->getModelo() . "\nAno: " . $this->getAno() . "\nDisponibilidade: " . ($this->isDisponivel()?"Está disponivel":"Não está disponivel") . "\nQuantidade de Portas: " . $this->qtdPortas;
        }
    }
?>