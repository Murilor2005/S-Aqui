<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senhacrip = base64_encode($senha);

$fotop = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));


$sessionStart = 1;

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if($conexao)
 echo "Conexão Estabelecida";

else
 echo "Error";

 
    $sql = "INSERT INTO cadastros(nome, email, senha, foto_perfil) VALUES ('$nome','$email', '$senhacrip', '$fotop')";
      
    mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    header("location:verFavoritos.php");

