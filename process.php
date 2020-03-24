<?php
    $personagem = $_POST['personagem'];
    $tipo = $_POST['tipo'];

    $cHost = "127.0.0.1";
    $cDatabase = "characters";
    $cPort = "3306";
    $cUsername = "root";
    $cPass = "trinity";

    $conexao = mysqli_connect($cHost, $cUsername, $cPass);
    $banco = mysqli_select_db($conexao,$cDatabase);

    if (!$conexao) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    $query = "SELECT * FROM characters WHERE name = '$personagem'";
    $result = $conexao->query($query) or die($conexao->error);
    $numrows = $result->num_rows;
    $row = $result->fetch_assoc();

    $result = rand(1,20);
    $won = false;
    $money = $row['money'];
    $newMoney = $money - 100000;

    $query = "UPDATE characters SET money = ".$newMoney." WHERE name = '$personagem'";
    $result = $conexao->query($query) or die($conexao->error);


    if ($tipo == "sorte1"){
        $resultado = rand(1,20);
        $winMoney = $newMoney + 2500000;
    }else{
        $resultado = rand(7,8);
        $winMoney = $newMoney + 250000;
    }

    if ($resultado == 7){
        $query = "UPDATE characters SET money = ".$winMoney." WHERE name = '$personagem'";
        $result = $conexao->query($query) or die($conexao->error);
        echo 'Você ganhou, saldo atual: '.$winMoney.' '.$tipo;
    }else{
        echo'Você perdeu, saldo atual: '.$newMoney.' '.$tipo;
    }



?>