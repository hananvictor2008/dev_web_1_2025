<?php
session_start();

// Verifica se usuário está logado
if(!isset($_SESSION['usuario_id'])) {
    header("Location: usuario/login.php"); // redireciona para login se não logado
    exit;
}

// Nome do usuário logado (opcional, se quiser mostrar)
require_once __DIR__."/../service/usuario.service.php";
$usuario = pegaUsuarioPeloId($_SESSION['usuario_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu Principal</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    h1 { margin-bottom: 20px; }
    ul { list-style-type: none; padding: 0; }
    li { margin: 10px 0; }
    a { text-decoration: none; color: blue; }
    a:hover { text-decoration: underline; }
</style>
</head>
<body>

<h1>Bem-vindo, <?= htmlspecialchars($usuario->nome) ?></h1>

<h2>Usuário</h2>
<ul>
    <li><a href="usuario/cadastro_usuario.php">Cadastrar Usuário</a></li>
    <li><a href="usuario/listar_usuarios.php">Ver Tabela de Usuários</a></li>
</ul>

<h2>Cliente</h2>
<ul>
    <li><a href="cliente/cadastro_cliente.php">Cadastrar Cliente</a></li>
    <li><a href="cliente/listar_clientes.php">Ver Tabela de Clientes</a></li>
</ul>

<h2>Funcionário</h2>
<ul>
    <li><a href="funcionario/cadastro_funcionario.php">Cadastrar Funcionário</a></li>
    <li><a href="funcionario/listar_funcionarios.php">Ver Tabela de Funcionários</a></li>
</ul>

<h2>Produto</h2>
<ul>
    <li><a href="produto/cadastro_produto.php">Cadastrar Produto</a></li>
    <li><a href="produto/listar_produtos.php">Ver Tabela de Produtos</a></li>
</ul>

<h2>Venda</h2>
<ul>
    <li><a href="venda/cadastro_venda.php">Cadastrar Venda</a></li>
    <li><a href="venda/listar_vendas.php">Ver Tabela de Vendas</a></li>
</ul>

<hr>

<p><a href="usuario/logout.php">Sair</a></p>

</body>
</html>
