<?php
require ('arquivos/sessao.php');
require_once("arquivos/conexao.php");
require_once("class/gestante.php");
$paciente = new gestante();
$id = $_POST['id'];
?>
<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Samuel Nunes">
        <meta name="description" content="app de cadastro de gestantes"> 
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/inf_paciente.css">
        <title>Cadastro de Gestantes</title>

    </head>
    <body>
        <header>
            <?php require("arquivos/cabecalho.php"); ?>
            

        </header> <?php
        
        $itens = $paciente->inf_gestante($id);
        if(!isset($_POST['ativo'])){
            //Calculando idade
            $nascim = $itens[0]['nasc'];
            $idade = strtotime(date('Y/m/d')) - strtotime($nascim);
            $idade = floor($idade / (60 * 60 * 24));
            $idade = $idade/365.25;
            $idade = floor($idade);
            //Calculando dias e semanas de gestação
            $dum = $itens[0]['dum'];
            $diferenca = strtotime(date('Y/m/d')) - strtotime($dum);
            $dias = floor($diferenca / (60 * 60 * 24));
            
            $semanas = $dias/7;
            $resto = $dias % 7;
            $semanas = number_format((float)$semanas, 0, '.', '');
            echo "<h1 id='nome'>".$itens[0]['nome']." <br>".$idade." anos</h1><br>";
            echo "<h1 id='inf'>CNS: ".$itens[0]['cns']."</h1><br>";
            $nasc = date("d/m/Y", strtotime($itens[0]['nasc']));
            echo "<h1 id='inf'>Nasc: ".$nasc."</h1><br>";
            $data_dum = date("d/m/Y", strtotime($itens[0]['dum']));
            echo "<h1 id='inf'>DUM: ".$data_dum."</h1><br>";
            echo "<h1 id='inf'>Semanas de Gestação: ".$semanas." e ".$resto." dias</h1><br>";
    ?>
            <form action="form_update.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" id="up" value="Editar">
            </form>
            <form action="arquivos/apagar.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" id="excluir" value="Apagar">
            </form>


            <form action="arquivos/finalizar_gestacao.php" method="post">
                <input type="hidden" name="id" value="<?=$itens[0]['id']?>">
                <label for="fim_gestacao">Final da Gestação:</label><br>
                <input type="date" required="required" name="fim" id="fim_getacao">
                <input type="submit" value="Finalizar Gestação" id="btn">
            </form>
        <?php 
        }else{
            //Calculando idade
            $nascim = $itens[0]['nasc'];
            $idade = strtotime(date('Y/m/d')) - strtotime($nascim);
            $idade = floor($idade / (60 * 60 * 24));
            $idade = $idade/365.25;
            $idade = floor($idade);
            //Calculando dias e semanas de gestação
            $dum = $itens[0]['dum'];
            $diferenca = strtotime($itens[0]['fim_gestacao']) - strtotime($dum);
            $dias = floor($diferenca / (60 * 60 * 24));
            $dias = $dias - 14;
            $semanas = $dias/7;
            $semanas = number_format((float)$semanas, 2, '.', '');
            echo "<h1 id='nome'>".$itens[0]['nome']." <br>".$idade." anos</h1><br>";
            echo "<h1 id='inf'>CNS: ".$itens[0]['cns']."</h1><br>";
            $nasc = date("d/m/Y", strtotime($itens[0]['nasc']));
            echo "<h1 id='inf'>Nasc: ".$nasc."</h1><br>";
            $data_dum = date("d/m/Y", strtotime($itens[0]['dum']));
            echo "<h1 id='inf'>DUM: ".$data_dum."</h1><br>";

            echo "<h1 id='inf'>Duração da Gestação: ".$semanas." Semenas</h1><br>";
            $fim_ges = date("d/m/Y", strtotime($itens[0]['fim_gestacao']));
            echo "<h1 id='inf'>Final da Gestação: ".$fim_ges."</h1><br>"; ?>
            <form action="form_update.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" id="up" value="Editar">
            </form>
            <form action="arquivos/apagar.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" id="excluir" value="Apagar">
            </form> <?php
        } ?>    
        </body>
</html>
