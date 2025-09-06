<?php
require_once __DIR__."/class_pai.class.php";
require_once __DIR__."/cliente.class.php";
require_once __DIR__."/funcionario.class.php";
require_once __DIR__."/produto.class.php";

class Venda extends ClassePai {
    public $cliente;
    public $vendedor;
    public $produtosVendidos;
    public $valorTotal;
    const NOME_ARQUIVO = "../../db/venda.txt";

    function montaLinhaDados() {
        $linha = $this->id.self::SEPARADOR
               .($this->cliente->id ?? 0).self::SEPARADOR
               .($this->vendedor->id ?? 0).self::SEPARADOR
               .$this->valorTotal.self::SEPARADOR;

        foreach($this->produtosVendidos ?? [] as $produto) {
            $linha .= $produto->id.self::SEPARADOR;
        }
        return rtrim($linha, self::SEPARADOR);
    }

    public function __construct($id, $cliente, $vendedor, $produtosVendidos, $valorTotal) {
        parent::__construct($id, self::NOME_ARQUIVO);
        $this->cliente = $cliente;
        $this->vendedor = $vendedor;
        $this->produtosVendidos = $produtosVendidos ?? [];
        $this->valorTotal = $valorTotal;
    }

    static public function pegaPorId($id) {
        $arquivo = fopen(self::NOME_ARQUIVO, "r+");
        if (!$arquivo) return null;

        while(!feof($arquivo)) {
            $linha = fgets($arquivo);
            if(empty(trim($linha))) continue;

            $dados = explode(self::SEPARADOR, $linha);
            if($dados[0] == $id) {
                fclose($arquivo);

                $idsProdutos = array_slice($dados, 4);
                $produtosObjs = self::pegaPorIds($idsProdutos);

                $clienteObj = Cliente::pegaPorId($dados[1]);
                $vendedorObj = Funcionario::pegaPorId($dados[2]);

                if (!$clienteObj || !$vendedorObj) return null;

                $valorTotal = $dados[3];
                return new Venda($dados[0], $clienteObj, $vendedorObj, $produtosObjs, $valorTotal);
            }
        }
        fclose($arquivo);
        return null;
    }

    static function pegaPorIds($ids) {
        $retorno = [];
        foreach($ids as $id) {
            $prod = Produto::pegaPorId($id);
            if($prod) $retorno[] = $prod;
        }
        return $retorno;
    }

    static public function listar($filtroNome) {
        $arquivo = fopen(self::NOME_ARQUIVO, "r+");
        $retorno = [];
        if (!$arquivo) return $retorno;

        while(!feof($arquivo)) {
            $linha = fgets($arquivo);
            if(empty(trim($linha))) continue;

            $dados = explode(self::SEPARADOR, $linha);
            $clienteObj = Cliente::pegaPorId($dados[1]);
            $vendedorObj = Funcionario::pegaPorId($dados[2]);

            if($clienteObj && $vendedorObj && str_contains($clienteObj->nome, $filtroNome)) {
                $idsProdutos = array_slice($dados, 4);
                $produtosObjs = self::pegaPorIds($idsProdutos);
                $valorTotal = $dados[3];

                $retorno[] = new Venda($dados[0], $clienteObj, $vendedorObj, $produtosObjs, $valorTotal);
            }
        }
        fclose($arquivo);
        return $retorno;
    }

    static public function vendaComMaisProdutos() {
        $vendas = self::listar("");
        $vendaMaisProdutos = null;
        foreach($vendas as $venda) {
            if($vendaMaisProdutos === null || count($venda->produtosVendidos) > count($vendaMaisProdutos->produtosVendidos)) {
                $vendaMaisProdutos = $venda;
            }
        }
        return $vendaMaisProdutos;
    }
}
?>
