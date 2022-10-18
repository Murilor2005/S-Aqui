<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Atualizar Senha</title>
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

        /*login*/
        #login {
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
            margin-bottom: 40px;
        }

        label,
        input {
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

        #recupera {
            text-align: right;
            display: block;
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

        /*cadastro*/
        #cadastro p {
            margin-bottom: 10px;
        }

        .centralizar {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="login">
        <h2>Trocar senha</h2>


        <?php

        $conexao = mysqli_connect("localhost", "root", "", "localhost");

        $chave = filter_input(INPUT_GET, 'chave');

        if (!empty($chave)) {

            $query_chave = "SELECT nome FROM cadastros WHERE recuperar_senha = '$chave'";
            $query_resultado = mysqli_query($conexao, $query_chave);

            if (mysqli_num_rows($query_resultado) != 0) {
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                $row_usuario = mysqli_fetch_row($query_resultado);
                if (!empty($dados['botenv'])) {
                    if ((isset($_POST["senhanov"]))) {
                        //atribuindo o array a variável
                        $senha = $_POST["senhanov"];

                        $senhacrip = base64_encode($senha);

                        //$senha_user = password_hash($senha, PASSWORD_DEFAULT);
                        if (($senha > 0)) {

                            $sql = "UPDATE cadastros SET senha = '$senhacrip', recuperar_senha = 'NULL' WHERE nome = '$row_usuario[0]'";
                            $consulta = mysqli_query($conexao, $sql);
                            $_SESSION["acerto"] = "Sucesso senha!";
                            header("location: login.php");
                        }
                    }
                }
            } else {
                $_SESSION["mens"] = "Link inválido!";
                header("location: recuperarSenha.php");
            }
        } else {
            $_SESSION["mens"] = "Link inválido!";
            header("location: recuperarSenha.php");
        }


        ?>


        <form  method='POST'> Insira a sua nova senha:<input type='password' required name='senhanov'><input type='submit' name='botenv' value='Cadastrar senha'></form>




        <a href="login.php" id="forgot-pass">Clique aqui para retornar ao login!</a>
    </div>
</body>

</html>