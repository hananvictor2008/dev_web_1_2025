<?php
    include_once("veiculo.class.php");
    class Moto extends Veiculo{
        private $cilindradas = 0;

        public function getCilindradas(){
            return $this->cilindradas;
        }

        public function setCilindradas($cilindradas){
            $this->cilindradas = $cilindradas;
        }

        public function __construct($marca, $modelo, $ano, $cilindradas){
            parent::__construct($marca, $modelo, $ano);
            $this->cilindradas = $cilindradas;
        }

        public function exibirDados(){
            echo "Marca: " . $this->getMarca() . "\nModelo: " . $this->getModelo() . "\nAno: " . $this->getAno() . "\nDisponibilidade: " . ($this->isDisponivel()?"Está disponivel":"Não está disponivel") . "\nCilindradas: " . $this->cilindradas;
        }
    }
?>