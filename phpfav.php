<?php

session_start();

$titulo = $_GET['titulo'];

$nomeus = $_SESSION['email'];

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if($conexao)
{
    echo "Conexão Estabelecida";
}

else
{
echo "Error";
}


$resultado = "SELECT * from favoritas WHERE titulo='$titulo' AND user='$nomeus'";

$query = mysqli_query($conexao, $resultado);

$row_cnt = mysqli_num_rows($query);

if($row_cnt == 0)
{
    $sql = "INSERT INTO favoritas(titulo, user) VALUES ('$titulo', '$nomeus')";
      
    mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    header("location:verFavoritos.php");
}

else if($row_cnt >= 1)
{
    echo"<br><br>Já foi adicionada!";
    header("location:existe.php");
}

?>