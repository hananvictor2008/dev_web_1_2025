<?php
    abstract class Veiculo{
        private $marca;
        private $modelo;
        private $ano;
        private $disponivel = true;

        public function __construct($marca, $modelo, $ano){
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->ano = $ano;
        }

        public function alugar(){
            $this->disponivel = false;
        }

        public function devolver(){
            $this->disponivel = true;
        }

        public function exibir(){
            echo "Marca: " . $this->marca . "\nModelo: " . $this->modelo . "\nAno: " . $this->ano . "\nDisponibilidade: " . ($this->disponivel?"Está disponivel":"Não está disponivel");
        }

        abstract public function exibirDados();

        public function isDisponivel(){
            return $this->disponivel;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function getAno(){
            return $this->ano;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function setAno($ano){
            $this->ano = $ano;
        }
    }
?>