<?php

session_start();

$titulo = $_GET['titulo'];

$nomeus = $_SESSION['nome'];

$conexao = mysqli_connect("localhost", "root", "", "localhost");



if ($conexao) {
    echo "Conexão Estabelecida";
} else {
    echo "Error";
}

$sql = "DELETE FROM publicacao WHERE titulo='$titulo' AND autor='$nomeus'";


mysqli_query($conexao, $sql);

mysqli_close($conexao);

header("location:inicio.php");
