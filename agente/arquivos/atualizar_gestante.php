<?php
    require_once('sessao.php');
    require_once('conexao.php');
    require_once('../class/gestante.php');
    $gestant = new gestante();
    if(isset($_POST['nome']) && $_POST['nome'] != ""){
        $nome = $_POST['nome'];
    }else{
        echo"<script>window.location.href='../index.php'</script>";
     //--------------------------------------------------------------   
    }if(isset($_POST['cns']) && $_POST['cns'] != ""){
        $cns = $_POST['cns'];
    }else{
        echo"<script>window.location.href='../index.php'</script>";
    }
    //--------------------------------------------------------------   
    if(isset($_POST['nasc']) && $_POST['nasc'] != ""){
        $nasc = $_POST['nasc'];
    }else{
        echo"<script>window.location.href='../index.php'</script>";
    }
    //--------------------------------------------------------------   
    if(isset($_POST['dum']) && $_POST['dum'] != ""){
        $dum = $_POST['dum'];
    }else{
        echo"<script>window.location.href='../index.php'</script>";
    }
    $id = $_POST['id'];
    $res = $gestant->atualiza_gestante($id, $nome, $cns, $nasc, $dum);
    if($res){
        echo"<script>
        alert('Atualizado com Sucesso')
        window.location.href='../index.php'</script>";
    }