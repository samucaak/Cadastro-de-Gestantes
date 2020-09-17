<?php
    require_once("sessao.php");
    require_once("conexao.php");
    require_once("../class/gestante.php");
    $paciente = new gestante();
    if(isset($_POST['id']) && isset($_POST['fim'])){
        $id = $_POST['id'];
        $data = $_POST['fim'];
        
        $res = $paciente->finaliza_gestacao($id, $data);
        if($res){
            echo "<script>alert('Gestação finalizada com sucesso!')
            window.location.href = '../lista_pacientes.php'</script>";
        }
    }else{
        echo "<script> window.location.href = '../lista_pacientes.php'</script>";
    }