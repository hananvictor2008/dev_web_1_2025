<?php
    include_once("veiculo.class.php");
    class Carro extends Veiculo{
        public $qtdPortas = 0;

        public function __construct($marca, $modelo, $ano, $disponivel, $qtdPortas){
            parent::__construct($marca, $modelo, $ano, $disponivel);
            $this->qtdPortas = $qtdPortas;
        }
    }
?>