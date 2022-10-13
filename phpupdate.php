<?php

session_start();

$titulo = $_POST['titulo'];

$stitulo = $_SESSION['titulo'];

$video = $_POST['video'];

$nomeus = $_SESSION['email'];

$pubpri = $_POST['pub/pri'];

$fil = $_POST['filtro'];

$editor_data = $_POST[ 'content' ];

$conteudoPartitura = base64_encode(file_get_contents($_FILES['partitura']['tmp_name']));

$conteudoCifra = base64_encode(file_get_contents($_FILES['cifra']['tmp_name']));

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if($conexao)
{
    echo "Conexão Estabelecida";    
}

else
{
echo "Error";
}
   
$sql = "UPDATE publicacao SET titulo='$titulo', conteudo='$editor_data', visu='$pubpri', filtro='$fil', video='$video', partitura='$conteudoPartitura', cifra='$conteudoCifra' WHERE titulo = '$stitulo' AND autor = '$nomeus'";

    mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    header("location:inicio.php");

?>