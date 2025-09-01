<?php
    class Cliente extends ClassePai {
        public $nome;
        public $telefone;
        const NOME_ARQUIVO = "../../db/cliente.txt";

        function montaLinhaDados()
        {
            return $this->id.self::SEPARADOR.$this->nome.self::SEPARADOR.$this->telefone;
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
                    return new Cliente($dados[0], $dados[1], $dados[2]);
                }
            }
            fclose($arquivo);
        }
    }
    
?>