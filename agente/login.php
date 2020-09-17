<?php session_start(); 
$saida = 1;
    if (isset($_SESSION['nome'])) { 
        header("location:index.php");
    }else{ ?>
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
        </head>
        <body>
        <?php
        #caso nao tenha nenhum dado do formulario de login, abra o formulario login.
        if(!isset($_POST['nome']) && !isset($_POST['senha'])){ ?>
            <h1 id="titulo" >Login do Agente</h1>
            <h2>Logar no Sistema</h2>
            <form action="login.php" method="post">
                <label for="nome"> Nome do Profissional</label> 
                <br> <input type="text" name="nome" id="nome">
                <label for="senha">Senha</label> 
                <br> <input type="password" name="senha" id="senha"><br><br><br>
                <input id="btn" type="submit" value="Entrar">
            </form>
            <a href="../index.php" >Voltar</a>
            <?php 
        #______________Final do formulario____________
        
        #Caso ja tenha sido enviado dados do formulario, criar uma sessao para o usuario logado e redirecione para pagina inicial
        }else{
            if(isset($_POST['nome']) && $_POST['nome'] != ""){
                $nome = $_POST['nome'];
            }else{
                echo"<script>alert('Esqueceu o Nome');
                window.location.href='login.php';
                </script>";
            }
            if(isset($_POST['senha']) && $_POST['senha'] != ""){
                $senha = $_POST['senha'];
            }else{
                echo"<script>alert('Esqueceu a Senha');
                window.location.href='login.php';
                </script>";
            }
            require_once('class/agente.php');
            $log = new agente(); 
            $itens = $log->select($nome, $senha);
            if (count($itens) == 1 && $itens[0]['prioridade'] == 1){
                $_SESSION['nome'] = $itens[0]['nome'];
                $_SESSION['id'] = $itens[0]['id'];
                $_SESSION['prioridade'] = $itens[0]['prioridade'];
                echo "Parabens ".$itens[0]['nome'].", você está Apto para usar o sistema";
                echo"<script>window.location.href='index.php'</script>";
            }else if($itens[0]['prioridade'] == 2){
                echo"<script>alert('Usuário com prioridade nivel Administrador!');
                window.location.href = '../admin/index.php';
                </script>";
            }else{
                echo"<script>alert('Usuario ou Senha estão incorretas');
                window.location.href = 'login.php';
                </script>";
            }
        } 
    }    ?>    
        </body> 
    </html>