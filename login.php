<?php
 session_start();

 session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <style>
            /*geral*/
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Verdana;
                border: none;
            }
           
            body{background-image: url(background.jpg);}

            textarea:focus, input:focus{outline: none;}
            
            a,label{font-size: .8rem; color: #96541e;}
            
            a:hover{color: #3d150b;}

            /*login*/
            #login{
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
            form{
                margin-top: 30px;
                margin-bottom: 40px;
            }

            label, .inp{
                display: block;
                width: 100%;
                text-align: left;
                background-color: #f4e19b;
            }

        
            

            label{
                font-weight: bold;
            }

            input{
                border-bottom: 2px solid #96541e;
                padding: 10px;
                font-size: 1rem;
                margin-bottom: 20px;
            }
            
            input:focus{
                border-bottom: 2px solid #3d150b;
            }

            #recupera{
                text-align: right;
                display: block;
            }

            input[type="submit"]{
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
                border: none;
                height: 40px;
                margin-top: 30px;
                color: #f4e19b;
                background-color: #96541e;
                cursor: pointer;
                padding-left:20px;
                padding-right:20px;
            }

            input[type="submit"]:hover{
                background-color: #3d150b;
                transition: 0.5s;
            }

            /*cadastro*/
            #cadastro p{
                margin-bottom: 10px;
            }

            .mostrarSenha
            {
                background-color: #f4e19b;
                color:#96541e;
                cursor: pointer;
                padding: 5px;
                border-radius: 10px;
            }

            .mostrarSenha:hover
            {
                transition: all .7s;
                background-color:#96541e;
                color: #f4e19b;
            }

            .erro{
                    background-color: red;
                    color: white;
                    font-weight: bold;
                    padding: 2px;
                    border: 2px solid red;
                    border-radius: 10px;
                    position: absolute;
                    top: 41%;
                    left: 46%;
                    width:fit-content;
                }


            #bloco
            {
                display:flex;
                justify-content:space-between;
            }

            #cadastro
            {
                display:block;
            }

        </style>
    </head>
    <body>
        <div id="login">
            <h2>Faça login, e começe a adquirir conhecimento hoje!</h2>
            <form method="POST" action="loginins.php">
                <label for="user">E-mail: </label>
                <input class="inp" type="email" name="email" required minlength="5" placeholder="Digite aqui seu email(Exemplo: email@gmail.com)"><br>
                <div class="inpsenha">
                <label for="senha">Senha: </label>
                <input class="inp" type="password" name="senha" required minlength="8" placeholder="Digite aqui sua senha"><br>
                <span class="icon">
                    <button class="mostrarSenha" type="button" id="mostrasenha">Mostrar senha!</button>
                </span>
                </div>
                <input type="submit" name="botao" value="Logar">
                <div id="bloco">
                    <div id="cadastro">
                    <p>Deseja fazer cadastro?</p>
                    <a href="cadastro.php" id="forgot-pass">Clique aqui para se cadastrar</a>
        </div>
                    <a href="recuperarSenha.php" id="recupera">Esqueceu sua senha?</a>
                </div>
                <br>
                
            </form>
            
        </div>
        <?php 
           
            if(isset($_SESSION["msg"]))
            {
             echo '<div><label class="erro">Login Incorreto!</label></div>';

             $_SESSION["msg"] = null;
            }
            ?>

            <script>
                const senha = document.querySelector("input[name=senha]");
                const but = document.querySelector("#mostrasenha");
                console.log(senha, but);

                but.addEventListener('click', () => {
                    if(senha.type === 'password'){
                        senha.type = 'text';
                    }else{
                        senha.type = 'password';
                    }
                })

            </script>
    </body>
</html>