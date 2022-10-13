<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cadastro</title>
    <style>
        /*geral*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana;
            border: none;
        }

        body {
            background-image: url(background.jpg);
        }

        textarea:focus,
        input:focus {
            outline: none;
        }

        a,
        label {
            font-size: .8rem;
            color: #96541e;
        }

        a:hover {
            color: #3d150b;
        }

        /*cadastro*/
        #cadastro {
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

        /*formulario*/
        form {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        label,
        .inp {
            display: block;
            width: 100%;
            text-align: left;
            background-color: #f4e19b;
        }

        label {
            font-weight: bold;
        }

        input {
            border-bottom: 2px solid #96541e;
            padding: 10px;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        input:focus {
            border-bottom: 2px solid #3d150b;
        }

        input[type="submit"] {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            border: none;
            height: 40px;
            margin-top: 30px;
            color: #f4e19b;
            background-color: #96541e;
            cursor: pointer;
            padding-left: 20px;
            padding-right: 20px;
        }



        input[type="submit"]:hover {
            background-color: #3d150b;
            transition: 0.5s;
        }

        .erro {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 2px;
            border: 2px solid red;
            border-radius: 10px;
            position: absolute;
            top: 525px;
            left: 43.75%;
            width: fit-content;
        }
    </style>
</head>

<body>
    <div id="cadastro">
        <h2>Cadastre-se</h2>
        <form name="cadastro" method="POST" action="cadastroins.php">
            <label for="user">Usuário: </label>
            <input class="inp" type="text" name="email" required minlength="5" placeholder="Digite aqui seu nome e sobrenome"><br>
            <label for="user">Senha: </label>
            <input class="inp" type="password" name="senha" required minlength="8" placeholder="Digite aqui sua senha(Mínimo 8 digitos)"><br>
            <label for="user">Insira uma palavra-chave: </label>
            <input class="inp" type="text" name="pch" placeholder="Digite aqui a sua palavra-chave!"><br>
            <label for="user">Insira uma dica para recuperar a palavra-chave: </label>
            <input class="inp" type="text" name="dica" placeholder="Digite aqui a dica!"><br>
            <input type="submit" name="botao" value="Concluir cadastro">
            <p>Já possui cadastro?</p>
            <a href="login.php" id="forgot-pass">Clique aqui para realizar o login</a>
        </form>
        <?php

        if (isset($_SESSION["msg"])) {
            echo '<div><label class="erro">Possui campos em branco!</label></div>';

            $_SESSION["msg"] = null;
        }
        ?>

</body>

</html>