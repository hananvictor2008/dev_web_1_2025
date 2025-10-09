<?php
include_once("funcionario.class.php");
class Gerente extends Funcionario {
    public function calcularBonus(): float {
        return $this->salario * 0.20;
    }
}
?>
