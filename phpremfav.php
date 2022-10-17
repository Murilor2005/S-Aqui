<?php

session_start();

$titulo = $_GET['titulo'];

$nomeus = $_SESSION['nome'];

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if($conexao)
{
    echo "Conexão Estabelecida";
}

else
{
echo "Error";
}


    $sql = " DELETE FROM favoritas WHERE titulo = '$titulo'";
      
    mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    header("location:verFavoritos.php");

?>