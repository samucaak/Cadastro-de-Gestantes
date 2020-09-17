<?php
session_start();
$saida = 1;
if(isset($_SESSION['prioridade'])){
    if($_SESSION['prioridade'] == 1){
        echo"<script> window.location.href = 'agente/form_gestante.php';
                </script>";
    }else if($_SESSION['prioridade'] == 2){
        echo"<script> window.location.href = 'admin/index.php';
                </script>";
    }
}
?>
<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Samuel Nunes">
        <meta name="description" content="app de cadastro de gestantes"> 
        <link rel="stylesheet" href="agente/css/index.css">
        <title>Cadastro de Gestantes</title>

    </head>
    <body>
        <header>
            <?php require("agente/arquivos/cabecalho.php"); ?>

        </header>
        <form action="admin/login.php" method="post">
            <input id="subindex" type="submit" value="Administrador">
        </form>
        <form action="agente/login.php" method="post">
            <input id="subindex" type="submit" value="Agente De Saúde">
        </form>
    </body>
</html>
