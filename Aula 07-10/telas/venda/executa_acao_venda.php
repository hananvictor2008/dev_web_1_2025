<?php
include_once("../../service/venda.service.php");

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';
$id = $_POST['id'] ?? $_GET['id'] ?? '';
$cliente = $_POST['cliente'] ?? null;
$vendedor = $_POST['funcionario'] ?? null;
$numProdutos = $_POST['numProdutos'] ?? 0;
$produtosVendidos = [];

for($i=1; $i<=$numProdutos; $i++) {
    if(isset($_POST['produto'.$i]) && $_POST['produto'.$i] != "") {
        $produtosVendidos[] = $_POST['produto'.$i];
    }
}

$valorTotal = $_POST['valorTotal'] ?? null;

switch($acao) {
    case "cadastrar":
        cadastrarVenda($cliente, $vendedor, $produtosVendidos, $valorTotal);
        echo "Cadastrado com sucesso";
        break;
    case "alterar":
        alterarVenda($id, $cliente, $vendedor, $produtosVendidos, $valorTotal);
        echo "Alterado com sucesso";
        break;
    case "remover":
        removerVenda($id);
        echo "Removido com sucesso";
        break;
    default:
        echo "Ação inválida";
}
?>
