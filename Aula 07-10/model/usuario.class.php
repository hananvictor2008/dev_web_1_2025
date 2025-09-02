<?php
    include("class_pai.class.php");
    class Usuario extends ClassePai {
        public $nome;
        public $email;
        public $senha;
        const NOME_ARQUIVO = "../../db/usuario.txt";

        public function __construct($id, $nome, $senha, $email) {
            parent::__construct($id, self::NOME_ARQUIVO);
            $this->nome = $nome;
            $this->senha = $senha;
            $this->email = $email;
        }
        
        static public function pegaPorId($id) {
            $arquivo = fopen(self::NOME_ARQUIVO, "r+");
            while(!feof($arquivo)){
                $linha = fgets($arquivo);
                if(empty($linha))
                    continue;
                $dados = explode(self::SEPARADOR, $linha);
                if($dados[0] == $id){
                    fclose($arquivo);
                    return new Usuario($dados[0], $dados[1], $dados[2], $dados[3]);
                }
            }
            fclose($arquivo);
        }

        function montaLinhaDados(){
            return $this->id.self::SEPARADOR.$this->nome.self::SEPARADOR.$this->senha.self::SEPARADOR.$this->email;
        }
        
        static public function listar($filtroNome) {
            $arquivo = fopen(self::NOME_ARQUIVO, "r+");
            $retorno = [];
            while(!feof($arquivo)){
                $linha = fgets($arquivo);
                if(empty($linha))
                    continue;
                $dados = explode(self::SEPARADOR, $linha);
                if(str_contains($dados[1], $filtroNome)){
                    array_push($retorno, new Usuario($dados[0], $dados[1], $dados[2], $dados[3]));
                }
                
            }
            return $retorno;
        }

        
    }
?>