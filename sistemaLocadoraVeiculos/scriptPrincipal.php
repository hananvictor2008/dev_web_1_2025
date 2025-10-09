<?php
    include_once("model/locadora.class.php");
    include_once("service/cliente.service.php");
    include_once("service/veiculo.service.php");
    include_once("model/locacao.class.php");
    $locadora = new Locadora();

// Adicionar Clientes
    adicionarCliente($locadora, "Hanan", "12345678900", "11999999999");
    adicionarCliente($locadora, "Ana", "98765432100", "11888888888");
    adicionarCliente($locadora, "Carlos", "45612378900", "11777777777");

// Adicionar Veículos
    adicionarVeiculo($locadora, "carro", "Toyota", "Corolla", 2020, 4);
    adicionarVeiculo($locadora, "moto", "Honda", "CB500", 2019, 500);
    adicionarVeiculo($locadora, "carro", "Ford", "Fiesta", 2018, 4);
    adicionarVeiculo($locadora, "moto", "Yamaha", "MT-07", 2021, 689);

// Realizar Locações
    $locacao1 = new Locacao($cliente1, $veiculo1, 5, 180);
    $locacao2 = new Locacao($cliente2, $veiculo3, 3, 150);

    $locadora->registrarLocacao($locacao1);
    $locadora->registrarLocacao($locacao2);

    echo "\n";

// Exibir Veículos Disponíveis e Locados
    $locadora->listarVeiculosDisponiveis();

    echo "\n";

// Exibir Locações
    $locadora->listarLocacoes();

// Menu
    $sair = false;
    do{
        echo "\nMenu:\n1. Registrar Locação\n2. Devolução de Veículo\n3 Cliente(CRUD)\n4. Veículo(CRUD)\n5. Listar Locações e Veículos Disponíveis\n6. Sair\nEscolha uma opção: ";
        $opcao = trim(fgets(STDIN));
        switch($opcao){
            case 1:
                echo "Registrar Locação:\n";
                // Listar Clientes
                foreach($locadora->clientes as $index => $cliente){
                    echo ($index + 1) . ". " . $cliente->getNome() . "\n";
                }
                echo "Escolha o cliente (número): ";
                $clienteIndex = trim(fgets(STDIN)) - 1;
                if(!isset($locadora->clientes[$clienteIndex])){
                    echo "Cliente inválido.\n";
                    break;
                }
                $clienteSelecionado = $locadora->clientes[$clienteIndex];

                // Listar Veículos Disponíveis
                $veiculosDisponiveis = array_filter($locadora->veiculos, fn($v) => $v->isDisponivel());
                if(empty($veiculosDisponiveis)){
                    echo "Nenhum veículo disponível para locação.\n";
                    break;
                }
                foreach(array_values($veiculosDisponiveis) as $index => $veiculo){
                    echo ($index + 1) . ". " . $veiculo->getMarca() . " " . $veiculo->getModelo() . "\n";
                }
                echo "Escolha o veículo (número): ";
                $veiculoIndex = trim(fgets(STDIN)) - 1;
                if(!isset(array_values($veiculosDisponiveis)[$veiculoIndex])){
                    echo "Veículo inválido.\n";
                    break;
                }
                $veiculoSelecionado = array_values($veiculosDisponiveis)[$veiculoIndex];

                echo "Data Início (YYYY-MM-DD): ";
                $dataInicio = trim(fgets(STDIN));
                echo "Data Fim (YYYY-MM-DD): ";
                $dataFim = trim(fgets(STDIN));

                $novaLocacao = new Locacao($clienteSelecionado, $veiculoSelecionado, $dataInicio, $dataFim);
                $locadora->registrarLocacao($novaLocacao);
                break;

            case 2:
                echo "Devolução de Veículo:\n";
                // Listar Locações Ativas
                if(empty($locadora->locacoes)){
                    echo "Nenhuma locação ativa.\n";
                    break;
                }
                foreach($locadora->locacoes as $index => $locacao){
                    echo ($index + 1) . ". " . $locacao->getVeiculo()->getMarca() . " " . $locacao->getVeiculo()->getModelo() . " alugado por " . $locacao->getCliente()->getNome() . "\n";
                }
                echo "Escolha a locação para devolução (número): ";
                $locacaoIndex = trim(fgets(STDIN)) - 1; 
                if(!isset($locadora->locacoes[$locacaoIndex])){
                    echo "Locação inválida.\n";
                    break;
                }
                $locacaoSelecionada = $locadora->locacoes[$locacaoIndex];
                $locadora->registrarDevolucao($locacaoSelecionada);
                break;
            case 3:
                echo "Gerenciar Clientes:\n1. Listar Clientes\n2. Adicionar Cliente\n3. Editar Cliente\n4. Remover Cliente\nEscolha uma opção: ";
                $subOpcao = trim(fgets(STDIN));
                switch($subOpcao){
                    case 1:
                        listarClientes($locadora);
                        break;
                    case 2:
                        echo "Nome: ";
                        $nome = trim(fgets(STDIN));
                        echo "CPF: ";
                        $cpf = trim(fgets(STDIN));
                        echo "Telefone: ";
                        $telefone = trim(fgets(STDIN));
                        adicionarCliente($locadora, $nome, $cpf, $telefone);
                        break;
                    case 3:
                        echo "CPF do Cliente a ser editado: ";
                        $cpf = trim(fgets(STDIN));
                        echo "Novo Nome (deixe vazio para não alterar): ";
                        $novoNome = trim(fgets(STDIN));
                        echo "Novo Telefone (deixe vazio para não alterar): ";
                        $novoTelefone = trim(fgets(STDIN));
                        editarCliente($locadora, $cpf, $novoNome ?: null, $novoTelefone ?: null);
                        break;
                    case 4:
                        echo "CPF do Cliente a ser removido: ";
                        $cpf = trim(fgets(STDIN));
                        removerCliente($locadora, $cpf);
                        break;
                    default:
                        echo "Opção inválida.\n";
                }
                break;
            case 4:
                echo "Gerenciar Veículos:\n1. Listar Veículos\n2. Adicionar Veículo\n3. Editar Veículo\n4. Remover Veículo\nEscolha uma opção: ";
                $subOpcao = trim(fgets(STDIN));
                switch($subOpcao){
                    case 1:
                        listarVeiculos($locadora);
                        break;
                    case 2:
                        echo "Tipo (carro/moto): ";
                        $tipo = trim(fgets(STDIN));
                        echo "Marca: ";
                        $marca = trim(fgets(STDIN));
                        echo "Modelo: ";
                        $modelo = trim(fgets(STDIN));
                        echo "Ano: ";
                        $ano = trim(fgets(STDIN));
                        if($tipo === "carro"){
                            echo "Quantidade de Portas: ";
                            $atributoEspecial = trim(fgets(STDIN));
                        } elseif($tipo === "moto"){
                            echo "Cilindradas: ";
                            $atributoEspecial = trim(fgets(STDIN));
                        } else {
                            echo "Tipo de veículo inválido.\n";
                            break;
                        }
                        adicionarVeiculo($locadora, $tipo, $marca, $modelo, $ano, $atributoEspecial);
                        break;
                    case 3:
                        echo "Marca do Veículo a ser editado: ";
                        $marca = trim(fgets(STDIN));
                        echo "Modelo do Veículo a ser editado: ";
                        $modelo = trim(fgets(STDIN));
                        echo "Novo Marca (deixe vazio para não alterar): ";
                        $novoMarca = trim(fgets(STDIN));
                        echo "Novo Modelo (deixe vazio para não alterar): ";
                        $novoModelo = trim(fgets(STDIN));
                        echo "Novo Ano (deixe vazio para não alterar): ";
                        $novoAno = trim(fgets(STDIN));
                        echo "Novo Atributo Especial (Quantidade de Portas ou Cilindradas) (deixe vazio para não alterar): ";
                        $novoAtributoEspecial = trim(fgets(STDIN));
                        editarVeiculo($locadora, $marca, $modelo, $novoMarca ?: null, $novoModelo ?: null, $novoAno ?: null, $novoAtributoEspecial ?: null);
                        break;
                    case 4:
                        echo "Marca do Veículo a ser removido: ";
                        $marca = trim(fgets(STDIN));
                        echo "Modelo do Veículo a ser removido: ";
                        $modelo = trim(fgets(STDIN));
                        removerVeiculo($locadora, $marca, $modelo);
                        break;
                }
                break;
            case 5:
                echo "Veículos Disponíveis:\n";
                $locadora->listarVeiculosDisponiveis();
                echo "\nLocações Ativas:\n";
                $locadora->listarLocacoes();
                break;
            case 6:
                $sair = true;
        }
    }while(!$sair);
?>