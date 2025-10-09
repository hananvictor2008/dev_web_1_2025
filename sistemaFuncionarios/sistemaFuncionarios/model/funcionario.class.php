<?php

// Classe abstrata Funcionario
abstract class Funcionario {
    protected $nome = "";
    protected $salario = 0;

    public function __construct(string $nome, float $salario) {
        $this->nome = $nome;
        $this->salario = $salario;
    }

    // Método abstrato que será implementado nas subclasses
    abstract public function calcularBonus(): float;

    public function getNome(): string {
        return $this->nome;
    }

    public function getSalario(): float {
        return $this->salario;
    }
}
?>
