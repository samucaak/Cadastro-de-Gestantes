<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];
    require_once('sessao.php');
    require_once('conexao.php');
    require_once('../class/agente.php');
    $agent = new agente();
    $res = $agent->apagar($id);
    if($res){
        echo"<script>
        alert('Agente Apagado com Sucesso!')
        window.location.href = '../lista_agentes.php';
        </script>";
    }
}else{

}