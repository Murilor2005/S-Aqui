<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'biblioteca/vendor/autoload.php';
$mail = new PHPMailer(true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Recuperar Senha</title>
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

        .acerto_rec {
            background-color: green;
            color: white;
            font-weight: bold;
            padding: 2px;
            border: 2px solid green;
            border-radius: 10px;
            position: absolute;
            top: 48%;
            left: 40%;
            width: fit-content;
        }

        .erro_rec {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 2px;
            border: 2px solid red;
            border-radius: 10px;
            position: absolute;
            top: 48%;
            left: 47%;
            width: fit-content;
            z-index: 4;
        }
    </style>
</head>

<body>
<?php 
session_start();
if(isset($_SESSION['mens']))
        {
            echo "<div> <label class='erro_rec'> Link Inválido</label></div>";
            $_SESSION['mens'] = NULL;
        }?>
    <div id="login">
        <h2>Recuperação de senha</h2> 
        <form method="POST">
            <label for="user">Insira o seu email cadastrado: </label>
            <input class="inp" type="text" name="email" required placeholder="Digite aqui seu email!">
            <div id="cadastro">
                <input type="submit" name="botao" value="Enviar e-mail">

                <a href="login.php" id="forgot-pass">Clique aqui para retornar ao login!</a>
            </div>
        </form>
    </div>
    <?php

    $conexao = mysqli_connect("localhost", "root", "", "localhost");
    

    if (isset($_POST["botao"])) {
        if (!empty($_POST["email"])) {
            //atribuindo o array a variável
            $email = $_POST["email"];

            $email_ok = "SELECT nome FROM cadastros WHERE email = '$email'";
            $result = mysqli_query($conexao, $email_ok);



            if (mysqli_num_rows($result) > 0) {
                $row_usuario = mysqli_fetch_row($result);
                $chave_recuperar_senha = password_hash($row_usuario[0], PASSWORD_DEFAULT);

                $query_up_usuario = "UPDATE cadastros SET recuperar_senha = '$chave_recuperar_senha' WHERE email = '$email'";
                $resultado = mysqli_query($conexao, $query_up_usuario);
                $link = "http://localhost/Projeto%20S%C3%B3Aqui%20-%20OFICIAL/puxsenha.php?chave=$chave_recuperar_senha";
                if ($resultado == 1) {

                    try {
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
                        $mail->CharSet = 'UTF-8';
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->SMTPSecure = 'ssl';
                        $mail->Username   = 'soaquisoft@gmail.com';
                        $mail->Password   = 'vdydxhtoczqiwdng';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port       = 465;
                        $mail->setFrom('soaquisoft@gmail.com', 'Redefinir Senha');
                        $mail->addAddress($email, $row_usuario[0]);
                        $mail->isHTML(true);
                        $mail->Subject = 'Recuperação de senha - Sistema SóAqui';
                        $mail->Body    = "Clique aqui para redefinir senha! $link";
                        $mail->AltBody = "Clique aqui para redefinir senha! $link";
                        $mail->send();

                       
        
                        echo "<div><label class='acerto_rec'> Email Enviado para $email </label></div>";
                
                    

                    } catch (Exception $e) {
                        echo "<div><label class='erro_rec'>";
                        echo "E-mail não enviado!";
                        echo "</label></div>";
                    }
                }
            }
            else{
                echo "<div><label class='erro_rec'>";
                echo "E-mail Inválido!";
                echo "</label></div>";
            }
        }
    }

    ?>
</body>

</html>