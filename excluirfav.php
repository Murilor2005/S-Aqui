<?php

session_start();

$titulo = $_POST['titulo'];

$nomeus = $_SESSION['nome'];

$conexao = mysqli_connect("localhost", "root", "", "localhost");

echo "$editor_data";

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
