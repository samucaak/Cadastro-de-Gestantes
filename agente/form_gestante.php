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
            <h1 id="titulo" >Cadastro de Gestante</h1>
            <h2>Realizar um Cadasttro</h2>

            <form action="arquivos/cadastrar_gestante.php" method="post">
                <label for="nome"> Nome da Gestante</label> 
                <br> <input type="text" required="required" name="nome" id="nome">
                <label for="senha">CNS da Gestante</label> 
                <br> <input type="number" required="required" max="999999999999999" min="100000000000000" name="cns" id="senha">
                <label for="nasc">Data de Nascimento</label>
                <br> <input type="date" required="required" name="nasc" id="nasc">
                <label for="dum">Data da última Menstruação</label>
                <br> <input type="date" required="required" name="dum" id="dum">
                <br><br><br>
                <input id="btn" type="submit" value="Cadastrar">
            </form>
            
        </body>
    </html>

