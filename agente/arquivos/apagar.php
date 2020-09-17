<?php
    require_once('sessao.php');
    require_once('conexao.php');
    require_once('../class/gestante.php');
    $gestant = new gestante();
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        echo $id;
        $res = $gestant->apagar($id);
        if($res){
            echo"<script>
            alert('Apagada com Sucesso')
            window.location.href='../index.php'</script>";
        }
    }else{
        echo"oi";
        echo"<script>window.location.href='../index.php'</script>";
    }