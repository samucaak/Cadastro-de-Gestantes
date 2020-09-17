<?php
if(isset($_POST['id'])){
require ('arquivos/sessao.php');
require_once('arquivos/conexao.php');
require_once('class/gestante.php');
$id = $_POST['id'];
$gestant = new gestante();
$itens = $gestant->inf_gestante($id);

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

            <form action="arquivos/atualizar_gestante.php" method="post">
                <label for="nome"> Nome da Gestante</label> 
                <br> <input type="text" required="required" value="<?=$itens[0]['nome']?>" name="nome" id="nome">
                
                <label for="senha">CNS da Gestante</label> 
                <br> <input type="number" required="required" value="<?=$itens[0]['cns']?>" max="999999999999999" min="100000000000000" name="cns" id="senha">
                
                <label for="nasc">Data de Nascimento</label>
                <br> <input type="date" required="required" value="<?=$itens[0]['nasc']?>" name="nasc" id="nasc">
                
                <label for="dum">Data da última Menstruação</label>
                <br> <input type="date" required="required" value="<?=$itens[0]['dum']?>" name="dum" id="dum">
                <input type="hidden" name="id" value="<?=$itens[0]['id']?>">
                <br><br><br>
                <input id="btn" type="submit" value="Atualizar">
            </form>
            
        </body>
    </html>
    <?php
    }else{
        echo"<script>window.location.href='index.php'</script>";
    }