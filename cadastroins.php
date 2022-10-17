<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senhacrip = base64_encode($senha);

$fotop = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));


$sessionStart = 1;

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if ($conexao)
   echo "Conexão Estabelecida";

else
   echo "Error";

$resultado = "SELECT * from cadastros WHERE nome='$nome'";

$query = mysqli_query($conexao, $resultado);

$row_cnt = mysqli_num_rows($query);

if ($row_cnt == 0) {
   $sql = "INSERT INTO cadastros(nome, email, senha, foto_perfil) VALUES ('$nome','$email', '$senhacrip', '$fotop')";

   mysqli_query($conexao, $sql);

   mysqli_close($conexao);

   header("location:login.php");
} else if ($row_cnt >= 1) {
   echo "<br><br>Já foi adicionada!";
   header("location:existeuser.php");
}
