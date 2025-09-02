<?php
    include("../../service/usuario.service.php");
    $acao = isset($_POST['acao'])?$_POST['acao']: $acao = $_GET['acao'];
    $id = isset($_POST['id'])?$_POST['id']: $_GET['id'];
    $nome = isset($_POST['nome'])?$_POST['nome']:null;
    $senha = isset($_POST['senha'])?$_POST['senha']:null;
    $email = isset($_POST['email'])?$_POST['email']:null;
    if($acao=="cadastrar") {
        cadastrarUsuario($nome, $senha, $email);
        echo "Cadastrado com sucesso";
    }
    else if($acao=="remover") {
        removerUsuario($id);
        echo "Removido com sucesso";
    }
    else if($acao=="alterar") {
      alterarUsuario($id, $nome, $senha, $email);
      echo "Alterado com sucesso";
    }
    else {
        echo "Ação inválida";
    }
?> 