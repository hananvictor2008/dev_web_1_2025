<?php
    include_once("../model/veiculo.class.php");
    include_once("../model/carro.class.php");
    include_once("../model/moto.class.php");

    function listarVeiculos($locadora, $filtroMarca = null, $filtroModelo = null){
        foreach($locadora->veiculos as $veiculo){
            if(($filtroMarca === null || stripos($veiculo->marca, $filtroMarca) !== false) &&
               ($filtroModelo === null || stripos($veiculo->modelo, $filtroModelo) !== false)){
                $veiculo->exibirDados();
                echo "\n-----------------\n";
            }
        }
        
    }
    
    function adicionarVeiculo($locadora, $tipo, $marca, $modelo, $ano, $atributoEspecial){
        if($tipo === "carro"){
            $veiculo = new Carro($marca, $modelo, $ano, $atributoEspecial);
        } elseif($tipo === "moto"){
            $veiculo = new Moto($marca, $modelo, $ano, $atributoEspecial);
        } else {
            echo "Tipo de veículo inválido.\n";
            return;
        }
        $locadora->adicionarVeiculo($veiculo);
        echo "Veículo adicionado com sucesso!\n";
    }

    function editarVeiculo($locadora, $marca, $modelo, $novoMarca = null, $novoModelo = null, $novoAno = null, $novoAtributoEspecial = null){
        foreach($locadora->veiculos as $veiculo){
            if($veiculo->marca === $marca && $veiculo->modelo === $modelo){
                if($novoMarca !== null) $veiculo->marca = $novoMarca;
                if($novoModelo !== null) $veiculo->modelo = $novoModelo;
                if($novoAno !== null) $veiculo->ano = $novoAno;
                if($novoAtributoEspecial !== null){
                    if($veiculo instanceof Carro){
                        $veiculo->setQtdPortas($novoAtributoEspecial);
                    } elseif($veiculo instanceof Moto){
                        $veiculo->setCilindradas($novoAtributoEspecial);
                    }
                }
                echo "Veículo atualizado com sucesso!\n";
                return;
            }
        }
        echo "Veículo não encontrado.\n";
    }

    function removerVeiculo($locadora, $marca, $modelo){
        foreach($locadora->veiculos as $index => $veiculo){
            if($veiculo->marca === $marca && $veiculo->modelo === $modelo){
                array_splice($locadora->veiculos, $index, 1);
                echo "Veículo removido com sucesso!\n";
                return;
            }
        }
        echo "Veículo não encontrado.\n";
    }
?>