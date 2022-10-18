<?php

session_start();

$titulo = $_POST['titulo'];

$nomeus = $_SESSION['nome'];

$fotous = $_SESSION['foto'];

$pubpri = $_POST['pub/pri'];

$fil = $_POST['filtro'];

$data = date('d/m/Y');
date_default_timezone_set('America/Sao_Paulo');

$video = $_POST['video'];

$conteudoPartitura = base64_encode(file_get_contents($_FILES['partitura']['tmp_name']));

$conteudoCifra = base64_encode(file_get_contents($_FILES['cifra']['tmp_name']));

$editor_data = $_POST[ 'content' ];

$sessionStart = 1;

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if($conexao)
 echo "Conexão Estabelecida";

else
 echo "Error";

 $resultado = "SELECT * from publicacao WHERE titulo='$titulo'";

$query = mysqli_query($conexao, $resultado);

$row_cnt = mysqli_num_rows($query);

if ($row_cnt == 0) {

    $sql = "INSERT INTO Publicacao (titulo, conteudo, autor, foto_autor, visu, filtro, datee, video, partitura, cifra) VALUES ('$titulo', '$editor_data', '$nomeus', '$fotous', '$pubpri', '$fil', '$data','$video', '$conteudoPartitura', '$conteudoCifra');";

   mysqli_query($conexao, $sql);

   mysqli_close($conexao);

   header("location:publica.php");
} 

else if ($row_cnt >= 1) {
   echo "<br><br>Já foi adicionada!";
   header("location:existepubli.php");
}

$sql = "INSERT INTO Publicacao (titulo, conteudo, autor, foto_autor, visu, filtro, datee, video, partitura, cifra) VALUES ('$titulo', '$editor_data', '$nomeus', '$fotous', '$pubpri', '$fil', '$data','$video', '$conteudoPartitura', '$conteudoCifra');";

mysqli_query($conexao, $sql);

header("location:publica.php");

mysqli_close($conexao);

