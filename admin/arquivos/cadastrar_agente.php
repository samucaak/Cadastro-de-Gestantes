<?php
    require_once("sessao.php");
    require_once("conexao.php");
    require_once("../class/agente.php");
    $agent = new agente();
    
    if(isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['prioridade'])){
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $prioridade = $_POST['prioridade'];
        $confere = $agent->select_nome($nome);
        if($confere < 1){
            $res = $agent->cadastra_agente($nome, $senha, $prioridade);
            if($res){
                echo"<script>alert('Cadastrado com Sucesso!')
                window.location.href = '../form_agente.php'</script>";
            }
        }else{
            echo"<script>alert('Não foi possivel cadastrar. Este Nome já está Cadastrado!')
            window.location.href = '../form_agente.php'</script>";
        }
    }else{
        echo"<script>alert('Não foi possivel cadastrar!')
            window.location.href = '../form_agente.php'</script>";
    }