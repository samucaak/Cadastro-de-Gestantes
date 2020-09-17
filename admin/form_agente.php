<?php
require ('arquivos/sessao.php');
?>
<DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Cadastro de Gestantes</title>
            <meta name="author" content="Samuel Nunes">
            <meta name="description" content="Site de cadastro de pacientes">
            <meta name="keywords" content="sites, web, desenvolvimento, financeiro, controle financeiro, dinheiro">
            <link rel="sortcut icon" href="img/icone.ico" type="image/x-icon" />
            <link rel="stylesheet" href="css/login.css">
            <script language='JavaScript'>
                function SomenteNumero(e){
                    var tecla=(window.event)?event.keyCode:e.which;   
                    if((tecla>47 && tecla<58)) return true;
                    else{
    	                if (tecla==8 || tecla==0) return true;
	                    else  return false;
                    }
                }
            </script>
        </head>
        <body>
            <header>
                <?php require("arquivos/cabecalho.php"); 
                //onkeypress='return SomenteNumero(event)'
                ?>
            </header>
            <h1 id="titulo" >Cadastro de Agente</h1>
            <h2>Realizar um Cadasttro</h2>

            <form action="arquivos/cadastrar_agente.php" method="post">
                <label for="nome"> Nome do Agente</label> 
                <br> <input type="text" required="required" name="nome" id="nome">

                <label for="senha">Senha</label> 
                <br> <input type="password" required="required"  name="senha" id="senha">
                
                <label for="prioridade">Prioridade</label>
                <select name="prioridade" id="prioridade">
                    <option id="selpri" value=1>Agente de Saúde</option> 
                    <option value=2>Administrador</option>
                </select>
                <br><br><br>
                <input id="btn" type="submit" value="Cadastrar">
            </form>
            
        </body>
    </html>
