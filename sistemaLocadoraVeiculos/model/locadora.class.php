<?php
    include_once("veiculo.class.php");
    include_once("cliente.class.php");
    include_once("locacao.class.php");
    class Locadora{
        public $clientes = [];
        public $veiculos = [];
        public $locacoes = [];

        public function adicionarCliente(Cliente $cliente){
            $this->clientes[] = $cliente;
        }

        public function adicionarVeiculo(Veiculo $veiculo){
            $this->veiculos[] = $veiculo;
        }

        public function registrarLocacao(Locacao $locacao){
            if($locacao->getVeiculo()->isDisponivel()){
                $locacao->getVeiculo()->alugar();
                $this->locacoes[] = $locacao;
                echo "Locação registrada com sucesso!\n";
            } else {
                echo "Veículo não está disponível para locação.\n";
            }
        }

        public function registrarDevolucao(Locacao $locacao){
            if($locacao->getVeiculo()->isDisponivel()){
                echo "Veículo já está disponível.\n";
                return;
            }else{
                $locacao->getVeiculo()->devolver();  
                echo "Devolução registrada com sucesso!\n";
            }
        }

        public function listarVeiculosDisponiveis(){
            foreach($this->veiculos as $veiculo){
                if($veiculo->isDisponivel()){
                    $veiculo->exibir();
                    echo "\n-----------------\n";
                }
            }
        }

        public function listarLocacoes(){
            foreach($this->locacoes as $locacao){
                $locacao->exibirDetalhes();
                echo "\n-----------------\n";
            }
        }
    }
?>