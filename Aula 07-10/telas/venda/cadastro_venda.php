<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Venda</title>

<?php
require_once __DIR__."/../../service/venda.service.php";
require_once __DIR__."/../../service/cliente.service.php";
require_once __DIR__."/../../service/funcionario.service.php";
require_once __DIR__."/../../service/produto.service.php";

// Carrega venda se estiver editando
$venda = null;
if(isset($_GET['id'])) {
    $venda = pegaVendaPeloId($_GET['id']);
}

// Preparar array de produtos para JS
$produtosJS = [];
if($venda && !empty($venda->produtosVendidos)) {
    foreach($venda->produtosVendidos as $p){
        if($p) $produtosJS[] = ['id'=>$p->id ?? '', 'nome'=>$p->nome ?? ''];
    }
}
?>
<script>
const produtosDisponiveis = <?php
        $todosProdutos = listarTodosProdutos(); // array de objetos Produto
        $produtosArray = array_map(function($p){
            return ['id'=>$p->id,'nome'=>$p->nome];
        }, $todosProdutos);
        echo json_encode($produtosArray, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP);
    ?>;
</script>

<script src="cadastro_venda.js" defer></script>
</head>
<body>

<form id="formCadastroVenda" action="executa_acao_venda.php" method="post">
    <input type="hidden" name="acao" value="<?= $venda ? 'alterar':'cadastrar'; ?>"/>
    <input type="hidden" name="id" value="<?= $venda->id ?? ''; ?>"/>

    <label>Funcionário:</label>
    <select name="funcionario">
    <?php foreach(listarTodosFuncionarios() as $f): ?>
        <option value="<?= $f->id ?>" <?= $venda && $venda->vendedor->id==$f->id ? 'selected':'' ?>><?= $f->nome ?></option>
    <?php endforeach; ?>
    </select><br>

    <label>Cliente:</label>
    <select name="cliente">
    <?php foreach(listarTodosClientes() as $c): ?>
        <option value="<?= $c->id ?>" <?= $venda && $venda->cliente->id==$c->id ? 'selected':'' ?>><?= $c->nome ?></option>
    <?php endforeach; ?>
    </select><br>

    <button type="button" id="qtdProdutos"> + </button>
    <div id="produtosContainer"></div>
    <input type="hidden" name="numProdutos" id="numProdutos" value="0"/>

    <label>Valor Total:</label>
    <input type="text" name="valorTotal" value="<?= $venda->valorTotal ?? 0 ?>"/>

    <button type="submit"><?= $venda ? 'Alterar' : 'Cadastrar' ?></button>
</form>

</body>
</html>
