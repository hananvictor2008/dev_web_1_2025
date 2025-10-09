<?php
    require_once('../model/cliente.class.php');
    require_once('../model/locadora.class.php');
    require_once('../model/veiculo.class.php');
    require_once('../model/carro.class.php');
    require_once('../model/moto.class.php');

    function listarClientes($locadora, $filtroNome = null){
        foreach($locadora->clientes as $cliente){
            if($filtroNome === null || stripos($cliente->nome, $filtroNome) !== false){
                $cliente->exibirDados();
                echo "\n-----------------\n";
            }
        }
        
    }

    function adicionarCliente($locadora, $nome, $cpf, $telefone){
        $cliente = new Cliente($nome, $cpf, $telefone);
        $locadora->adicionarCliente($cliente);
        echo "Cliente adicionado com sucesso!\n";
    }

    function editarCliente($locadora, $cpf, $novoNome = null, $novoTelefone = null){
        foreach($locadora->clientes as $cliente){
            if($cliente->cpf === $cpf){
                if($novoNome !== null) $cliente->nome = $novoNome;
                if($novoTelefone !== null) $cliente->telefone = $novoTelefone;
                echo "Cliente atualizado com sucesso!\n";
                return;
            }
        }
        echo "Cliente não encontrado.\n";
    }

    function removerCliente($locadora, $cpf){
        foreach($locadora->clientes as $index => $cliente){
            if($cliente->cpf === $cpf){
                array_splice($locadora->clientes, $index, 1);
                echo "Cliente removido com sucesso!\n";
                return;
            }
        }
        echo "Cliente não encontrado.\n";
    }
?>