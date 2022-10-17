<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Já existe!</title>
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

        .erro {
            background-color: red;
            color: white;
            font-weight: bold;
            padding: 2px;
            border: 2px solid red;
            border-radius: 10px;
            position: absolute;
            top: 364px;
            left: 46%;
            width: fit-content;
        }


        #bloco {
            display: flex;
            justify-content: space-between;
        }

        #cadastro {
            display: block;
            align-items: center;
            margin-left: 40px;
        }

        .opc {
            color: #96541e;
            font-size: large;
            text-align: center;
            position: relative;
        }

        .but {
        background-color: #f4e19b;
        left: 20%;
        border-color: #3d150b;
        border-radius: 30%;
    }

    .but:hover {
        transition: 0.7s;
        background-color: #96541e;
        border-color: #f4e19b;
    }
    </style>
</head>

<body>
    <div id="login">
        <h2>Esta publicação já foi adicionada aos Meus Favoritos!</h2>
        <form>
            <div id="bloco">
                <div id="cadastro">
                    <br>
                    <p>Clique abaixo para voltar para as Publicações!</p>
                    <a href="publica.php" id="forgot-pass"><img src='https://img.icons8.com/ios-filled/30/000000/left3.png'/></a>
                </div>
            </div>
            <br>

        </form>

    </div>
</body>

</html>