<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pesquisa</title>
    <script>
        function msg() {
            window.confirm("Você tem certeza que deseja excluir esta publicação?\nSim(Ok)\nNão(Cancelar)");

            if (confirm("Para Excluir(Ok)\nPara Cancelar(Cancelar)")) {

            } else {
                event.preventDefault();
            }
        }
    </script>
</head>
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
        text-transform: uppercase;
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

    input[type="text"]:focus {
        border: 2px solid #3d150b;
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

    input[type="submit"]:hover {
        color: #96541e;
        background-color: #f4e19b;
        transition: 0.5s;
    }

    input[type="checkbox"] {
        visibility: hidden;
    }

    /*perfil*/
    #perfil {
        display: block;
        position: absolute;
        top: 70px;
        height: fit-content;
        transition: .5s;
        list-style: none;
        right: 5px;
        background-color: #96541e;
        visibility: hidden;
        overflow-y: hidden;
        border-color: black;
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

    h1 {
        text-align: center;
        color: #ffff;
    }

    #fav {
        background-color: transparent;
        border: none;
        cursor: pointer;

    }

    .botao_fav {
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        border: none;
        height: 40px;
        margin-top: 30px;
        color: #f4e19b;
        background-color: #3d150b;
        cursor: pointer;
        padding-left: 20px;
        padding-right: 20px;
        border-radius: 100px;
    }

    .botao_fav:hover {
        transition: 0.75s;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        border: none;
        height: 40px;
        margin-top: 30px;
        color: #3d150b;
        background-color: #f4e19b;
        cursor: pointer;
        padding-left: 20px;
        padding-right: 20px;
        border-radius: 100px;
    }

    main {
        display: flex;

        margin-top: 2.5%;
        Flex-wrap: wrap;
    }

    .box {
        background: rgb(130, 95, 60);
        background: linear-gradient(90deg, rgba(130, 95, 60, 1) 0%, rgba(176, 104, 20, 0.8575805322128851) 31%, rgba(130, 85, 37, 1) 66%);
        margin-top: -1%;
        margin-left: 5%;
        margin-right: 5%;
        max-width: 100%;
        border: solid;
        padding: 2.5%;
        padding-top: 0%;
        border-radius: 10px;
        border-color: rgb(130, 95, 60);
        font-size: 60%;
        color: white;
        font-size: large;
        margin-bottom: 50px;
        position: relative;
    }

    .tit-page {
        color: #3d150b;
        font-family: verdana;
    }

    .imgs {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 3%;
    }

    .alinhalado {
        margin-left: auto;
        margin-bottom: auto;
    }

    .boxpai {
        flex: 50%;
    }
</style>

<body>
    <header id="header">
        <img src="logo.png" id="logo">
        <nav>
            <ul id="menu">
                <li><a href="publica.php">Publicações</a>
                    <ul>
                        <li><a href="publica.php">Públicas</a></li>
                        <li><a href="verFavoritos.php">Meus Favoritos</a></li>
                        <li><a href="inicio.php">Minhas Publicações</a></li>
                    </ul>
                </li>
                <li><a href="criarpubli.php">Criar Publicações</a></li>
                <li><a href="categorias.php">Categorias</a></li>
            </ul>
        </nav>
        <nav>
            <form method="POST" action="buscar.php">
                <ul id="pesquisa">
                    <li><a href="#"><input type="text" name="pesquisa" placeholder="Qual publicação você deseja buscar?"></a></li>
                    <li><a href="#"><input type="submit" name="botaoPesq" value="Buscar"></a></li>
                </ul>
            </form>
        </nav>
        <nav>
            <?php
            $nomeus = $_SESSION['email'];

            echo "<input type='checkbox' id='check'>
                <label for='check'><a>Você acessou como $nomeus</a></label>";
            ?>
            <ul id="perfil">
                <li><a href="verFavoritos.php">Meus favoritos ❣</a></li>
                <li><a href="inicio.php">Minhas Publicações 🪶</a></li>
                <li><a href="login.php">Sair🚪</a></li>
            </ul>
        </nav>
    </header>

    <br>
    <?php
    $pesquisa = $_POST['pesquisa'];


    echo "<h1 class='tit-page'>Resultados com '$pesquisa'</h1>";
    ?>
    <br>
    <br>
    <main>
        <?php

        function __getYouTubeEmbeddedURL($url)
        {
            return "https://www.youtube.com/embed/" . __getYouTubeID($url);
        }
        function __getYouTubeID($url)
        {
            $queryString = parse_url($url, PHP_URL_QUERY);
            parse_str($queryString, $params);
            if (isset($params['v']) && strlen($params['v']) > 0) {
                return $params['v'];
            } else {
                return "";
            }
        }

        $pesquisa = $_POST['pesquisa'];



        $conexao = mysqli_connect("localhost", "root", "", "localhost");

        $sql = "SELECT * FROM publicacao WHERE titulo like '%$pesquisa%' AND visu='Pública' ORDER BY datee DESC ";

        $resultado = mysqli_query($conexao, $sql);


        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo '<br><div class="boxpai"><div class="box"><label>';

            echo "<h1><b><i> " . $linha["titulo"] . "   </i></b></h1></label>"

                . html_entity_decode($linha["conteudo"]) . '';

            echo "<form class='alinhalado' method='POST' action='visucomp.php?titulo=" . $linha['titulo'] . "'><b><i> <input class='botao_fav' type='submit' value='Ver mais'</i></b></form>";

            echo "<form class='bots1' method='POST' action='excluirfav.php?titulo=" . $linha['titulo'] . "'><b><i> <input class='botao_fav' type='submit' value='Desfavoritar'</i></b></form><br>";

            echo "<br><label><b><i>Categoria: <u> " . $linha['filtro'] . "</u></i></b><br><br></label>";

            echo "<label><b><i>Publicado por<u> " . $linha["autor"] . "</u></i></b></label>";

            echo "<label><b><i> em <u>" . $linha["datee"] . "</u></i></b></label><br></div></div>";
        }


        mysqli_close($conexao);

        ?>
        <br>
    </main>
</body>

</html>