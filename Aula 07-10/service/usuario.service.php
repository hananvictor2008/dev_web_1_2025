<?php
    if($_SESSION["i"]) include_once("../model/usuario.class.php");
    else include_once("../../model/usuario.class.php");
    function cadastrarUsuario($nome, $senha, $email) {
        $usuario = new Usuario(null, $nome, $senha, $email);
        $usuario->cadastrar();

    }
    
    function pegaUsuarioPeloId($id) {
        return Usuario::pegaPorId($id);
    }

    function alterarUsuario($id, $novoNome, $novaSenha, $novoEmail) {
        $usuario = Usuario::pegaPorId($id);
        if ($usuario) {
            $usuario->nome = $novoNome;
            $usuario->senha = $novaSenha;
            $usuario->email = $novoEmail;
            $usuario->alterar();
        }
    }

    function removerUsuario($id) {
        $usuario = Usuario::pegaPorId($id);
        if ($usuario) {
             $usuario->remover();
        }
    }

    function listarUsuario($filtroNome) {
        $usuarios = Usuario::listar($filtroNome);
        echo "<table><thead><tr><th>Nome</th><th>Senha</th><th>Email</th>";
        echo '<th colspan="2">Ações</th>';//NOVA LINHA
        echo "</tr></thead><tbody>";
        foreach($usuarios as $usuario) {
            echo "<tr><td>".$usuario->nome."</td>";
            echo "<td>".$usuario->senha."</td>";
            echo "<td>".$usuario->email."</td>";
            echo "<td><a href='http://localhost/hanan/Aula%2007-10/telas/usuario/cadastro_usuario.php?id=".$usuario->id."'>Alterar</a></td>";
            echo "<td><a href='http://localhost/hanan/Aula%2007-10/telas/usuario/executa_acao_usuario.php?id=".$usuario->id."&acao=remover'>Remover</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";

    }


    function listarTodosUsuarios() {
        return Usuario::listar("");
    }

?>