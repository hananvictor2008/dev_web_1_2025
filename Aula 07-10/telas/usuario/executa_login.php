<?php
session_start();
require_once __DIR__."/../../service/usuario.service.php";

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$usuarios = listarTodosUsuarios();
$usuarioEncontrado = null;

foreach($usuarios as $u) {
    // Remove espaços em branco extras
    $u_email = trim($u->email);
    $u_senha = trim($u->senha);

    if($u_email === $email && $u_senha === $senha) {
        $usuarioEncontrado = $u;
        break;
    }
}

if($usuarioEncontrado) {
    $_SESSION['usuario_id'] = $usuarioEncontrado->id;
    $_SESSION['usuario_nome'] = $usuarioEncontrado->nome;
    echo "Login realizado com sucesso! Bem-vindo, ".$usuarioEncontrado->nome;
    echo '<br><a href="../menu.php">Ir para área de menu</a>';
} else {
    echo "Email ou senha incorretos!";
    echo '<br><a href="login.php">Voltar</a>';
}
?>
