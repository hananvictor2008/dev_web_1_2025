<?php
    include("../../model/cliente.class.php");

    

    function listarTodosClientes() {
        return Cliente::listar("");
    }
?>
