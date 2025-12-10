<?php
 abstract class ClassePai {
    public $id;     
    private $nomeArquivo="";
    const SEPARADOR = "#";
    const NOME_ARQUIVO = " ";
    public function __construct($id, $nomeArquivo) {
        $this->id = $id;
        $this->nomeArquivo = $nomeArquivo;
    }
    abstract function montaLinhaDados();
    abstract function toEntity($dados);
 }
 ?>