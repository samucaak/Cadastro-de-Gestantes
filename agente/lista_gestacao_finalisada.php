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
        <title>Lista de Gestantes</title>
    </head>
    <body>
        <header>
            <?php require("arquivos/cabecalho.php"); ?>
            <h1 id="lista">Lista de Gestantes Acompanhadas</h1>
        </header>
        <?php
            $itens = $gestante->gestacao_finalisada($agente);
            $num = count($itens);
            $con = 0;
            while($con < $num){?>
                
                <form action="inf_paciente.php" method="post">
                    <input type="hidden" name="ativo" value="0">
                    <input type="hidden" name="id" value="<?=$itens[$con]['id']?>">
                    <input type="submit" id="transparente" value="<?=$con+1?> <?=$itens[$con]['nome']?>">
                </form>
                <?php //echo "<a href='inf_paciente.php?id_gestante=".$itens[$con]['id']."'><p>".$itens[$con]["nome"]."</p></a>";
                 $con++;
            } 
        ?>
       
    </body>
</html>