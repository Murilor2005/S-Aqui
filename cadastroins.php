<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$pchave = $_POST['pch'];
$dica = $_POST['dica'];

$senhacrip = base64_encode($senha);

if(empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['pch']) || empty($_POST['dica'])) 
{

    $_SESSION['msg'] = "Erro";
    $_SESSION['start'] = $sessionStart;
    
    unset ($_SESSION['email']);
    $sessionStart = 2;
    header("location:cadastro.php");

}

else{

$sessionStart = 1;

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if($conexao)
 echo "Conexão Estabelecida";

else
 echo "Error";

 $resultado = "SELECT * from Cadastros WHERE email='$email'";

$query = mysqli_query($conexao, $resultado);

$row_cnt = mysqli_num_rows($query);

if($row_cnt == 0)
{
    $sql = "INSERT INTO Cadastros(email, senha, pchave, dica) VALUES ('$email', '$senhacrip', '$pchave', '$dica')";
      
    mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    header("location:verFavoritos.php");
}

else if($row_cnt >= 1)
{
    echo"<br><br>Já foi adicionada!";
    header("location:existeuser.php");
}
}
