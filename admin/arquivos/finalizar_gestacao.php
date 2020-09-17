<?php
    $id = $_POST['id'];
    $data = $_POST['fim'];
    require_once("conexao.php");
    require_once("../class/gestante.php");
    $paciente = new gestante();
    $res = $paciente->finaliza_gestacao($id, $data);
    if($res){
        echo "<script>alert('Gestação finalizada com sucesso!')
        window.location.href = '../lista_pacientes.php'</script>";
    }