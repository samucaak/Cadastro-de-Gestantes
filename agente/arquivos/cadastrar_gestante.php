<?php
require_once ('sessao.php');
require_once('conexao.php');

    if (isset($_POST['nome']) && isset($_POST['cns']) && isset($_POST['nasc']) && isset($_POST['dum'])) {
        $nome = $_POST['nome'];
        $cns = $_POST['cns'];
        $nasc = $_POST['nasc'];
        $dum = $_POST['dum'];
        $agente_responsavel = $_SESSION['id'];
        require_once("../class/gestante.php");
        $paciente = new gestante();
        $paciente->cadastrar($nome, $cns, $nasc, $dum, $agente_responsavel);
    }else{
        echo "<script>window.location.href='../form_gestante.php'</script>";
    }