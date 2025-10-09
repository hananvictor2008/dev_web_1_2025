<?php
    include_once("veiculo.class.php");
    include_once("cliente.class.php");
    class Locacao{
        private Veiculo $veiculo;
        private Cliente $cliente;
        private $dataInicio;
        private $dataFim;

        public function __construct(Cliente $cliente, Veiculo $veiculo, $dataInicio, $dataFim){
            $this->veiculo = $veiculo;
            $this->cliente = $cliente;
            $this->dataInicio = $dataInicio;
            $this->dataFim = $dataFim;
        }

        public function getVeiculo(){
            return $this->veiculo;
        }

        public function getCliente(){
            return $this->cliente;
        }

        public function getDataInicio(){
            return $this->dataInicio;
        }

        public function getDataFim(){
            return $this->dataFim;
        }

        public function exibirDetalhes(){
            echo "Detalhes da Locação:\n";
            $this->cliente->exibirDados();
            echo "\n";
            $this->veiculo->exibirDados();
            echo "\nData Início: " . $this->dataInicio . "\nData Fim: " . $this->dataFim;
        }
    }
?>