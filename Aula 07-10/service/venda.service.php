<?php
    include("../../model/venda.class.php");
    function cadastrarVenda($cliente, $vendedor, $produtosVendidos, $valorTotal) {
        $venda = new Venda(null, $cliente, $vendedor, $produtosVendidos, $valorTotal);
        $venda->cadastrar();

    }

    function pegaVendaPeloId($id) {
        return Venda::pegaPorId($id);
    }

    function alterarVenda($id, $novoCliente, $novoVendedor, $novosProdutosVendidos, $novoValorTotal) {
        $venda = Venda::pegaPorId($id);
        if ($venda) {
            $venda->nome = $novoCliente;
            $venda->vendedor = $novoVendedor;
            $venda->produtosVendidos = $novosProdutosVendidos;
            $venda->valorTotal = $novoValorTotal;
            $venda->alterar();
        }
    }

    function removerVenda($id) {
        $venda = Venda::pegaPorId($id);
        if ($venda) {
             $venda->remover();
        }
    }

    function listarVendas($filtroNome) {
        $vendas = Venda::listar($filtroNome);
        echo "<table><thead><tr><th>Vendedor</th><th>Cliente</th>";
        for($i = 0; $i < Venda::vendaComMaisProdutos; $i++){
            echo "<th>Produto ".($i+1)."</th>";
        }
        echo "<th>Ações</th></tr></thead>";
        echo "<tbody>";
        foreach($vendas as $venda) {
            echo "<tr><td>".$venda->vendedor."</td>";
            echo "<tr><td>".$venda->cliente."</td>";
            for($i = 0; $i < Venda::vendaComMaisProdutos; $i++){
                if(isset($venda->produtosVendidos[$i]))
                    echo "<tr><td>".$venda->produtosVendidos[$i]."</td></tr>";
                else
                    echo "<tr><td> - </td></tr>";
            }
            echo "<td>".$venda->preco."</td>";
            echo "<td><a href='http://localhost/hanan/Aula%2007-10/telas/produto/cadastro_venda.php?id=".$venda->id."'>Alterar</a></td></tr>";
        }
        echo "</tbody></table>";

    }


    function listarTodosProdutos() {
        return Venda::listar("");
    }

?>

