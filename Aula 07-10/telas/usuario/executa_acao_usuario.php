<?php
require_once __DIR__."/../../service/usuario.service.php";

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';
$id = $_POST['id'] ?? $_GET['id'] ?? '';
$nome = $_POST['nome'] ?? '';
$senha = $_POST['senha'] ?? '';
$email = $_POST['email'] ?? '';

if($acao == "cadastrar") {
    cadastrarUsuario($nome, $senha, $email);
    echo "Usuário cadastrado com sucesso!";
} 
elseif($acao == "alterar") {
    alterarUsuario($id, $nome, $senha, $email);
    echo "Usuário alterado com sucesso!";
} 
elseif($acao == "remover") {
    removerUsuario($id);
    echo "Usuário removido com sucesso!";
} 
else {
    echo "Ação inválida.";
}

echo '<br><a href="cadastro_usuario.php">Voltar</a>';
?>
