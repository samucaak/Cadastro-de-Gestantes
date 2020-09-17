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
        <title>Painel de Controle</title>
    </head>
    <body>
        <header>
            <?php require("arquivos/cabecalho.php"); ?>
            <h1 id="lista">Painel deControle</h1>
            
            <form methot="post" action="form_agente.php">
                <input id="painelbtn" type="submit" value="Cadastrar Agente">
            </form>
            <form methot="post" action="lista_agentes.php">
                <input id="painelbtn" type="submit" value="Lista de Agentes">
            </form>
            <form methot="post" action="lista_pacientes.php">
                <input id="painelbtn" type="submit" value="Lista de Gestantes">
            </form>
            <form methot="post" action="lista_gestacao_finalisada.php">
                <input id="painelbtn" type="submit" value="Gestações Finalisadas">
            </form>
            <form methot="post" action="sair.php">
                <input id="painelbtn" type="submit" value="Sair">
            </form>
        </header>
        
    </body>
</html>