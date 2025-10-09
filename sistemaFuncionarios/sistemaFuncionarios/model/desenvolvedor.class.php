<?php
include_once("funcionario.class.php");
class Desenvolvedor extends Funcionario {
    public function calcularBonus(): float {
        return $this->salario * 0.10;
    }
}
?>
