<?php

session_start();

$titulo = $_POST['titulo'];

$nomeus = $_SESSION['email'];

$pubpri = $_POST['pub/pri'];

$fil = $_POST['filtro'];

$data = date('d/m/Y');
date_default_timezone_set('America/Sao_Paulo');

$video = $_POST['video'];

$conteudoPartitura = base64_encode(file_get_contents($_FILES['partitura']['tmp_name']));

$conteudoCifra = base64_encode(file_get_contents($_FILES['cifra']['tmp_name']));

$cifra = $_FILES['cifra']['tmp_name'];

$editor_data = $_POST[ 'content' ];

$sessionStart = 1;

$conexao = mysqli_connect("localhost", "root", "", "localhost");

if($conexao)
 echo "Conexão Estabelecida";

else
 echo "Error";

$sql = "INSERT INTO Publicacao (titulo, conteudo, autor, visu, filtro, datee, video, partitura, cifra) VALUES ('$titulo', '$editor_data', '$nomeus', '$pubpri', '$fil', '$data','$video', '$conteudoPartitura', '$conteudoCifra');";

mysqli_query($conexao, $sql);

header("location:publica.php");

mysqli_close($conexao);

