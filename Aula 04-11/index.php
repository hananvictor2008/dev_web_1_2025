<?php
// Permitir qualquer origem (para testes; em produção, limite ao domínio correto)
header("Access-Control-Allow-Origin: *");
// Permitir métodos HTTP específicos
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Permitir headers específicos
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Responder rapidamente a requisições OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_errors.log');

require_once __DIR__ . "/controller/GenericController.php";
require_once __DIR__ . "/controller/LivroController.php";
require_once __DIR__ . "/controller/UsuarioController.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$modulo = @$_GET['modulo'];
$controller = null;
$mysqli = new mysqli("localhost", "root", "", "biblioteca"); //conecta com o db

switch($modulo) {
    case "usuario":
        $controller = new UsuarioController($mysqli);
        break;
    case "livro":
        $controller = new LivroController($mysqli);
        break;
    default:
        echo json_encode(["erro" => true, "mensagem" => "Módulo Inválido"]);
        exit;
}

$dadosRecebidos = json_decode(file_get_contents("php://input"));

switch($metodo) {
    case "POST":
        $controller->cadastrar($dadosRecebidos);
        echo json_encode(["erro"=>false, "mensagem"=> "Cadastrado com sucesso!"]);
        exit;
    case "GET":
        echo json_encode($controller->listar($dadosRecebidos));
        exit;
    case "PUT":
        echo json_encode($controller->alterar($dadosRecebidos));
        exit;
    case "DELETE":
        var_dump("oi");
        $controller->remover($dadosRecebidos);
        echo json_encode(["erro"=>false, "mensagem"=> "Removido com sucesso!"]);
        exit;
}
