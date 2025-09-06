<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Usuário</title>
</head>
<body>

<?php
require_once __DIR__."/../../service/usuario.service.php";

$usuario = null;
if(isset($_GET['id'])) {
    $usuario = pegaUsuarioPeloId($_GET['id']);
}
?>

<h2><?= $usuario ? "Editar Usuário" : "Cadastrar Usuário" ?></h2>

<form action="executa_acao_usuario.php" method="post">
    <input type="hidden" name="acao" value="<?= $usuario ? 'alterar' : 'cadastrar' ?>"/>
    <input type="hidden" name="id" value="<?= $usuario->id ?? '' ?>"/>

    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $usuario->nome ?? '' ?>" required/><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $usuario->email ?? '' ?>" required/><br>

    <label>Senha:</label>
    <input type="password" name="senha" value="<?= $usuario->senha ?? '' ?>" required/><br>

    <button type="submit"><?= $usuario ? 'Alterar' : 'Cadastrar' ?></button>
</form>

<hr>
<h3>Usuários Cadastrados</h3>
<?php
listarUsuario(""); // Lista todos os usuários
?>
</body>
</html>
