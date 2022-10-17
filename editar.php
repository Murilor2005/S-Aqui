<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Editar Publicações</title>
</head>
<script src="https://cdn.tiny.cloud/1/k97oq0d22d5rin768evczwgy63qg5z4qpn7xrc31hgfjtrht/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<style>
    /*geral*/
    body,
    ul {
        margin: 0;
        padding: 0;
        background-color: #f4e19b;
    }

    a {
        color: #f4e19b;
        text-decoration: none;
        font-family: sans-serif;
        text-transform: uppercase;
    }


    #nome {
        font-size: 15px;
    }

    /*logo*/
    #logo {
        width: 100px;

    }

    /*cabeçalho*/
    #header {
        box-sizing: border-box;
        height: 70px;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #96541e;
    }

    /*menu*/
    #menu,
    #pesquisa {
        display: flex;
        list-style: none;
        gap: .5rem;
        background-color: #96541e;
        width: fit-content;
    }

    #menu a,
    #pesquisa a {
        display: block;
        padding: .5rem;
    }

    #menu li {
        position: relative;
    }

    #menu li a:hover {
        background-color: #3d150b;
        transition: 0.5s;
    }

    /*sub-menu letras e cifras*/
    #menu ul {
        display: none;
        position: absolute;
        list-style: none;
        top: 34.5px;
        width: 88.5px;
        background-color: #96541e;
        width: fit-content;
    }

    #menu li:hover>ul {
        display: block;
    }

    #menu ul a {
        display: block;
        padding: .5rem;
    }

    /*sub-menu modificações*/
    #menu ul ul {
        display: none;
        left: 91px;
        top: 19px;
        position: absolute;
    }

    #menu ul li:hover>ul {
        display: block;
        width: 175px;
    }

    /*campo de pesuisa*/
    textarea:focus,
    input:focus {
        outline: none;
    }

    input[type="text"] {
        text-align: center;
        font-weight: bold;
        border: none;
        width: 240px;
        height: 40px;
        border-radius: 5px;
        background-color: #f4e19b;
        border: 2px solid #96541e;
    }

    input[type="url"] {
        text-align: center;
        font-weight: bold;
        border: none;
        width: 240px;
        height: 40px;
        border-radius: 5px;
        background-color: #f4e19b;
        border: 2px solid #96541e;
    }

    input[type="text"]:focus {
        border: 2px solid #3d150b;
    }

    .ckeditor {
        background-color: #f4e19b;
        width: 800px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px 30px;
        margin-top: 10vh;
        border-radius: 10px;
        text-align: center;
    }

    .numlinks {
        background-color: #f4e19b;
        width: 500px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px 30px;
        margin-top: 10vh;
        border-radius: 10px;
        text-align: center;
        color: #96541e;
    }

    input {
        width: fit-content;
    }

    input[type="submit"] {
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        border: none;
        height: 40px;
        border-radius: 20px;
        color: #f4e19b;
        background-color: #3d150b;
        cursor: pointer;
    }

    input[type="submit"] {
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        border: none;
        height: 40px;
        border-radius: 20px;
        color: #f4e19b;
        background-color: #3d150b;
        cursor: pointer;
    }

    input[type="button"] {
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        border: none;
        height: 40px;
        border-radius: 20px;
        color: #f4e19b;
        background-color: #3d150b;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        color: #96541e;
        background-color: #f4e19b;
        transition: 0.5s;
    }

    input[type="checkbox"] {
        visibility: hidden;
    }

    #perfil {
        display: block;
        position: absolute;
        top: 70px;
        height: fit-content;
        transition: .5s;
        list-style: none;
        right: 5px;
        z-index: 1;
        background-color: #96541e;
        visibility: hidden;
        overflow-y: hidden;
    }


    #perfil a {
        display: block;
        padding: 20px 40px;
        border-bottom: 2px solid #3d150b;
    }

    label {
        cursor: pointer;
        z-index: 1;
    }

    #perfil label:hover {
        background-color: #96541e;
    }

    #perfil li a:hover {
        background-color: #3d150b;
        transition: 0.5s;
    }


    input[type="checkbox"]:checked~#perfil {
        height: fit-content;
        visibility: visible;
    }

    input[type="radio"] {
        color: #96541e;
        font-size: medium;
    }

    .grid img,
    .sec img {
        max-width: 100%;
        display: block;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 200px;
        grid-gap: 20px;
        max-width: 800px;
        padding: 10px;
        margin: 0 auto;
    }

    #arqs {
        background-color: #f4e19b;
        width: 500px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px 30px;
        margin-top: 10vh;
        border-radius: 10px;
        text-align: center;
        color: #96541e;
    }

    .sec>div {
        margin-bottom: 10px;
    }

    @media (max-width: 600px) {
        .grid {
            grid-template-columns: 1fr;
        }

        .sec {
            display: flex;
            overflow: scroll;
        }

        .sec>div {
            flex: 1 1 200px;
            margin: 0 10px;
        }
    }

    h1,
    h2,
    h3 {
        color: #96541e;
        font-size: large;
        font-weight: bold;
    }

    p {
        color: #96541e;
        font-size: large;
    }

    label {
        color: #96541e;
        font-size: large;
        font-family: 'verdana';
    }

    .op {
        color: #3d150b;
        font-size: large;
        font-weight: bold;
    }

    .arq1 {
        color: #f4e19b;
        background-color: #96541e;
        border-radius: 5px;
        margin-top: auto;
        font-family: 'verdana';
    }

    .arq2 {
        color: #f4e19b;
        background-color: #96541e;
        border-radius: 5px;
        margin-top: auto;
        font-family: 'verdana';
    }

    .oparq {
        color: #96541e;
        border-radius: 5px;
        margin-top: auto;
        font-family: 'verdana';
        font-size: medium;
    }

    .erro {
        background-color: red;
        color: white;
        font-weight: bold;
        padding: 2px;
        border: 2px solid red;
        border-radius: 10px;
        position: absolute;
        top: 50%;
        left: 41.5%;
        width: fit-content;
    }
    .img
    {
        border-radius: 100%;
    }

    .but{
        background-color: #f4e19b;
        left:20%;
        border-color:#3d150b;
        border-radius: 30%;
    }

    .but:hover{
        transition: 0.7s;
        background-color:#96541e;
        border-color: #f4e19b;
    }
</style>

<body>
    <header id="header">
        <img src="logo.png" id="logo">
        <nav>
            <ul id="menu">
                <li><a href="#">Publicações</a>
                    <ul>
                        <li><a href="publica.php">Públicas</a>

                        </li>
                        <li><a href="inicio.php">Minhas Publicações</a>
                        </li>
                    </ul>
                </li>
                <li><a href="criarpubli.php">Criar Publicações</a></li>
                <li><a href="categorias.php">Categorias</a></li>
            </ul>
        </nav>
        <nav>
            <form method="POST" action="buscar.php">
                <ul id="pesquisa">
                    <li><a href="#"><input type="text" name="pesquisa" placeholder="Qual música você deseja buscar?"></a></li>
                    <li><a href="#"><button type="submit" class="but" name="botaoPesq"><img src="https://img.icons8.com/pastel-glyph/32/000000/search--v1.png" /></button></a></li>
                </ul>
            </form>
        </nav>
        <nav>
            <?php
            $sessionStart = 1;
            $fotous = $_SESSION['foto'];
            $nomeus = $_SESSION['nome'];

            echo "<input type='checkbox' id='check'>
                <label for='check'><a>$nomeus</a><img class='img' width='40px' src='data:image/jpeg;base64,$fotous' /></label>";
            ?>
            <ul id="perfil">
                <li><a href="verFavoritos.php">Meus favoritos ❣</a></li>
                <li><a href="inicio.php">Minhas Publicações 🪶</a></li>
                <li><a href="login.php">Sair🚪</a></li>
            </ul>
        </nav>
    </header>

    <form class="ckeditor" action="phpupdate.php" method="POST" enctype="multipart/form-data">

        <?php

        $titulo = $_GET['titulo'];

        $_SESSION['titulo'] = $titulo;

        echo "<label>Titulo: </label> <input required minlength='7' class= 'inp' type='text' name='titulo' placeholder='Digite aqui seu titulo!' value='$titulo'><br><br>";


        echo "<textarea required name='content' id='mytextarea'> ";

        $conexao = mysqli_connect("localhost", "root", "", "localhost");

        $sql = "SELECT * FROM publicacao WHERE titulo='$titulo' AND autor='$nomeus' AND visu='Pública' OR (titulo='$titulo' AND autor='$nomeus' AND visu='Privada')";



        $resultado = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "" . $linha["conteudo"] . "</textarea>";

            echo " <br><br><label>Vídeo: </label>  <input required type='url' name='video' value='" . $linha["video"] . "'>";

        }

        mysqli_close($conexao);

        ?>
       
        <br>
        <br>
        <label class="oparq">Cifra ou Partitura: </label>
        <input required class="arq1" type="file" id="partitura" name="partitura">

        <br><br>
        <br>
        <label class="oparq">Cifra ou Partitura:</label>
        <input required class="arq2" type="file" id="cifra" name="cifra"><br><br>
        <br>

        <br>
        <label>Selecione a categoria em que a sua postagem se encaixa:</label>
        <br>
        <input required type="radio" name="filtro" value="Dica" /><label class="op"> Dica</label><br />
        <input required type="radio" name="filtro" value="Como aprender?" /><label class="op"> Como aprender?</label><br />
        <input required type="radio" name="filtro" value="Anotação" /><label class="op"> Anotação</label><br />
        <input required type="radio" name="filtro" value="Noticias do mundo da música" /><label class="op"> Noticias do mundo da música</label><br />
        <br>
        <br>
        <label>Selecione o modo de visualização da sua postagem:</label>
        <br>
        <input required type="radio" name="pub/pri" value="Pública" /><label class="op"> Pública</label><br />
        <input required type="radio" name="pub/pri" value="Privada" /><label class="op"> Privada</label><br />
        <br>
        <br>
        <input type="submit" value="Publicar">
        <br>
        <br>
    </form>

    </section>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>