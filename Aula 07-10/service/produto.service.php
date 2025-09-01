<?php
    include("../../model/produto.class.php");
    function cadastrarProduto($nome, $preco) {
        $produto = new Produto(null, $nome, $preco);
        $produto->cadastrar();

    }

    function pegaProdutoPeloId($id) {
        return Produto::pegaPorId($id);
    }

    function alterarProduto($id, $novoNome, $novoPreco) {
        $produto = Produto::pegaPorId($id);
        if ($produto) {
            $produto->nome = $novoNome;
            $produto->preco = $novoPreco;
            $produto->alterar();
        }
    }

    function removerProduto($id) {
        $produto = Produto::pegaPorId($id);
        if ($produto) {
             $produto->remover();
        }
    }

    function listarProdutos($filtroNome) {
        $produtos = Produto::listar($filtroNome);
        echo "<table><thead><tr><th>Nome</th><th>Preco</th><th>Ações</th></tr></thead>";
        echo "<tbody>";
        foreach($produtos as $produto) {
            echo "<tr><td>".$produto->nome."</td>";
            echo "<td>".$produto->preco."</td>";
            echo "<td><a href='http://localhost/hanan/Aula%2007-10/telas/produto/cadastro_produto.php?id=".$produto->id."'>Alterar</a></td></tr>";
        }
        echo "</tbody></table>";

    }


    function listarTodosProdutos() {
        return Produto::listar("");
    }

?>

