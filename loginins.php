<?php

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$senhacrip = base64_encode($senha);

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if (!$conexao) {
  die("Falha na conexão com o banco...");
}

$sql = "SELECT * FROM cadastros WHERE email='$email' AND senha='$senhacrip'";


$resultado = mysqli_query($conexao, $sql);

while ($linha = mysqli_fetch_assoc($resultado)) {

  $_SESSION['nome'] = $linha['nome'];
}

if (mysqli_num_rows($resultado)) {
  $sessionStart = 1;

  $linha = mysqli_fetch_array($resultado);

  $_SESSION['email'] = $email;

  
  
  header("location:publica.php");


  $_SESSION['start'] = $sessionStart;
} else {
  $_SESSION['msg'] = "Erro";
  $_SESSION['start'] = $sessionStart;

  unset($_SESSION['email']);
  $sessionStart = 2;
  header("location:login.php");
}
