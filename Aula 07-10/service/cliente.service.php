<?php
    include_once("../../model/cliente.class.php");
    function cadastrarCliente($nome, $telefone) {
        $cliente = new Cliente(null, $nome, $telefone);
        $cliente->cadastrar();

    }

    function pegaClientePeloId($id) {
        return Cliente::pegaPorId($id);
    }

    function alterarCliente($id, $novoNome, $novoTelefone) {
        $cliente = Cliente::pegaPorId($id);
        if ($cliente) {
            $cliente->nome = $novoNome;
            $cliente->telefone = $novoTelefone;
            $cliente->alterar();
        }
    }

    function removerCliente($id) {
        $cliente = Cliente::pegaPorId($id);
        if ($cliente) {
             $cliente->remover();
        }
    }

    function listarClientes($filtroNome) {
        $clientes = Cliente::listar($filtroNome);
        echo "<table><thead><tr><th>Nome</th><th>Telefone</th>";
        echo '<th colspan="2">Ações</th></tr>';
        echo "</thead><tbody>";
        foreach($clientes as $cliente) {
            echo "<tr><td>".$cliente->nome."</td>";
            echo "<td>".$cliente->telefone."</td>";
            echo "<td><a href='http://localhost/hanan/Aula%2007-10/telas/cliente/cadastro_cliente.php?id=".$cliente->id."'>Alterar</a></td>";
            echo "<td><a href='http://localhost/hanan/Aula%2007-10/telas/cliente/executa_acao_cliente.php?id=".$cliente->id."&acao=remover'>Remover</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";

    }


    function listarTodosClientes() {
        return Cliente::listar("");
    }

?>

