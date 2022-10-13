
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recuperar Palavra-Chave</title>
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
        </style>
    </head>
    <body>
        <div id="login">
            <h2>Recuperação de Palavra-Chave</h2>
            <form method="POST" action="puxdica.php">
                    <br><label>Caso não se lembre da palavra-chave, digite aqui seu usuário:</label>
                    <input class="inp" type="text" name="email" required placeholder="Digite aqui seu usuário">
                    <input type="submit" name="botao" value="Clique aqui para receber a dica">
                    <div id="cadastro">
                    <p>Deseja voltar ao login?</p>
                    <a href="login.php" id="forgot-pass">Clique aqui para voltar ao login!</a>
        </div>
                </form>
                </div>
            </form>
        </div>
<?php
?>
    </body>
</html>

                
