<?php
require_once __DIR__."/../model/venda.class.php";
require_once __DIR__."/../model/cliente.class.php";
require_once __DIR__."/../model/funcionario.class.php";
require_once __DIR__."/../model/produto.class.php";

function cadastrarVenda($cliente, $vendedor, $produtosVendidos, $valorTotal) {
    $clienteObj = Cliente::pegaPorId($cliente);
    $vendedorObj = Funcionario::pegaPorId($vendedor);
    $produtosObjs = [];
    foreach ($produtosVendidos as $idProd) {
        $prod = Produto::pegaPorId($idProd);
        if($prod) $produtosObjs[] = $prod;
    }
    if($clienteObj && $vendedorObj) {
        $venda = new Venda(null, $clienteObj, $vendedorObj, $produtosObjs, $valorTotal);
        $venda->cadastrar();
    }
}

function pegaVendaPeloId($id) {
    return Venda::pegaPorId($id);
}

function alterarVenda($id, $novoCliente, $novoVendedor, $novosProdutosVendidos, $novoValorTotal) {
    $venda = Venda::pegaPorId($id);
    if ($venda) {
        $clienteObj = Cliente::pegaPorId($novoCliente);
        $vendedorObj = Funcionario::pegaPorId($novoVendedor);
        $produtosObjs = [];
        foreach ($novosProdutosVendidos as $idProd) {
            $prod = Produto::pegaPorId($idProd);
            if($prod) $produtosObjs[] = $prod;
        }
        if($clienteObj && $vendedorObj) {
            $venda->cliente = $clienteObj;
            $venda->vendedor = $vendedorObj;
            $venda->produtosVendidos = $produtosObjs;
            $venda->valorTotal = $novoValorTotal;
            $venda->alterar();
        }
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
    $vendaMaisProdutos = Venda::vendaComMaisProdutos();
    $maxProdutos = $vendaMaisProdutos ? count($vendaMaisProdutos->produtosVendidos) : 0;

    echo "<table border='1'><thead><tr>";
    echo "<th>Vendedor</th><th>Cliente</th>";
    for($i = 0; $i < $maxProdutos; $i++){
        echo "<th>Produto ".($i+1)."</th>";
    }
    echo "<th>Valor Total</th><th colspan='2'>Ações</th></tr></thead><tbody>";

    foreach($vendas as $venda) {
        echo "<tr>";
        echo "<td>".$venda->vendedor->nome."</td>";
        echo "<td>".$venda->cliente->nome."</td>";
        for($i = 0; $i < $maxProdutos; $i++){
            echo "<td>".($venda->produtosVendidos[$i]->nome ?? "-")."</td>";
        }
        echo "<td>".$venda->valorTotal."</td>";
        echo "<td><a href='cadastro_venda.php?id=".$venda->id."'>Alterar</a></td>";
        echo "<td><a href='executa_acao_venda.php?id=".$venda->id."&acao=remover'>Remover</a></td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
}
?>
