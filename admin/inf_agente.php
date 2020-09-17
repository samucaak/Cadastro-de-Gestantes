<?php
require ('arquivos/sessao.php');
require_once("arquivos/conexao.php");
require_once("class/agente.php");
$agentee = new agente();
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
            <?php require("arquivos/cabecalho.php"); 
            $id = $_POST['id'];
            $itens = $agentee->select_id($id);
            $nome = $itens[0]['nome'];
            $id = $itens[0]['id'];
            $prioridade = $itens[0]['prioridade'];
            ?>
            <h1 id="nomeagente"><?=$nome?></h1>
            <form action="lista_pacientes_agentes.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="ativa" value="1">
                <input type="submit" id="btndireciona" value="Gestantes Ativas">
            </form>
            <form action="lista_pacientes_agentes.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="ativa" value="0">
                <input type="submit" id="btndireciona" value="Gestações Finalizadas">
            </form>
        </header>
            <form action="arquivos/apagar.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" id="excluirbtnapagar" value="Apagar">
            </form>
    
         
        </body>
</html>
