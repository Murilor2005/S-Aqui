<?php

session_start();

$spchave = $_SESSION["pchave"];

$senha = $_POST['senhanov'];

$senhacrip =  base64_encode($senha);

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if ($conexao) {
    echo "Conexão Estabelecida";
} else {
    echo "Error";
}

if ($sql = "pchave='$pchave'") {

    $sql = "UPDATE cadastros SET senha='$senhacrip' WHERE pchave = '$spchave'";

    mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    header("location:inicio.php");
}
