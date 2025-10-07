<?php
    class Cliente{
        public $nome;
        public $cpf;
        public $telefone;

        public function __construct($nome, $cpf, $telefone){
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->telefone = $telefone;
        }

        public function exibirDados(){
            echo "Cliente: ". $this->nome . "\nCPF: " . $this->cpf . "\nTelefone: " . $this->telefone;
        }
    }
?>