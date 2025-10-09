<?php
include_once("model/desenvolvedor.class.php");
include_once("model/funcionario.class.php");
include_once("model/gerente.class.php");
$funcionarios = [
    new Gerente("Marcos Silva", 10000),
    new Desenvolvedor("Ana Paula", 7000),
    new Desenvolvedor("Carlos Souza", 8500),
    new Gerente("Fernanda Lima", 12000),
    new Desenvolvedor("Juliana Torres", 9000)
];

foreach ($funcionarios as $funcionario) {
    echo "Funcionário: " . $funcionario->getNome() . "\n";
    echo "Salário: R$ " . number_format($funcionario->getSalario(), 2, ',', '.') . "\n";
    echo "Bônus: R$ " . number_format($funcionario->calcularBonus(), 2, ',', '.') . "\n\n";
}
?>
