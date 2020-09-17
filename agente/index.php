<?php
require ('arquivos/sessao.php');
$agente = $_SESSION['id'];
require_once("arquivos/conexao.php");
require_once("class/gestante.php");
$gestante = new gestante();
?>
<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Samuel Nunes">
        <meta name="description" content="app de cadastro de gestantes"> 
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/lista_pacientes.css">
        <title>Cadastro de Gestantes</title>
    </head>
    <body>
        <header>
            <?php require("arquivos/cabecalho.php"); ?>
            <h1 id="lista">Acompanhamento de Gestantes</h1>
        </header>
        <form method="post" action="form_gestante.php">
            <input id="painelbtn" type="submit" value="Cadastrar Gestante">
        </form>
        <form method="post" action="lista_pacientes.php">
            <input id="painelbtn" type="submit" value="Lista de Gestantes">
        </form>
        <form method="post" action="lista_gestacao_finalisada.php">
            <input id="painelbtn" type="submit" value="Gestações Finalisadas">
        </form>
        
        
        
        <div id='obs'>
        <h1 id="obs">Gestantes com mais de 35 Semanas</h1>
        <?php  
            $itens = $gestante->semanas($_SESSION['id']);
            $num = count($itens);
            $con = 0;
            while($con < $num){ ?>

                <form id="obs" action="inf_paciente.php" method="post">
                    <input type="hidden" name="id" value="<?=$itens[$con]['id']?>">
                    <input type="submit" value="<?=$itens[$con]['nome']?>">
                </form>
                <?php //echo "<a href='inf_paciente.php?id_gestante=".$itens[$con]['id']."'><p>".$itens[$con]["nome"]."</p></a>";
                 $con++;
            } 
        ?>
        </div>
        
    </body>
</html>