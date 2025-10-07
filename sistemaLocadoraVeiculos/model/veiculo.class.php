<?php
    abstract class Veiculo{
        public $marca;
        public $modelo;
        public $ano;
        public $disponivel;

        public function __construct(){
            
        }

        public function alugar(){
            $this->disponivel = false;
        }

        public function devolver(){
            $this->disponivel = true;
        }

        public function exibir(){
            echo "Marca: " . $this->marca . "\nModelo: " . $this->modelo . "\nAno: " . $this->ano . "\nDisponibilidade: " . $this->disponivel?"Está disponivel":"Não está disponivel";
        }
    }
?>