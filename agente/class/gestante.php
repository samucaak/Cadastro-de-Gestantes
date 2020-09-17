<?php
if(isset($saida)){}else{
    echo"<script>window.location.href='../sair.php'</script>";
}
class gestante{
    private $nome;
    private $cns;
    private $nasc;
    private $dum;

    public function cadastrar($nome, $cns, $nasc, $dum, $agente_responsavel){
        $pdo = getConnect();
        $sql = "INSERT INTO gestante (nome, cns, nasc, dum, agente_responsavel, gestacao_ativa) VALUES (:nome, :cns, :nasc, :dum, :agente_responsavel, :gestacao_ativa)"; 
        $stmt =$pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome); 
        $stmt->bindValue(':cns', $cns); 
        $stmt->bindValue(':nasc', $nasc); 
        $stmt->bindValue(':dum', $dum); 
        $stmt->bindValue(':agente_responsavel', $agente_responsavel);
        $stmt->bindValue(':gestacao_ativa', true); 
        $res = $stmt->execute();
        var_dump($res);
        if($res == true){
            echo "<script language='javaScript'>
            alert('Cadastro realizado com sucesso!')
            window.location.href='../form_gestante.php'</script>";
        } 

    
    }
    public function apagar($id){
        $pdo = getConnect();
        $sql = "DELETE FROM gestante WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $res = $stmt->execute();
        return $res;
    }
    public function lista($agente){
        $pdo = getConnect();
        $sql = "SELECT * FROM gestante WHERE agente_responsavel = :agente && gestacao_ativa = :ativa";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":agente", $agente);
        $stmt->bindValue(":ativa", 1);
        $stmt->execute();
        $itens = $stmt->fetchAll();
        return $itens;
    }
    public function semanas($agente){//245 dias
        $pdo = getConnect();
        $data_a_verificar = date("Y-m-d", strtotime("-259 day"));
        $sql = "SELECT * FROM gestante WHERE dum <= :dum && agente_responsavel = :agente && gestacao_ativa = :ativa";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":dum", $data_a_verificar);
        $stmt->bindValue(":agente", $agente);
        
        $stmt->bindValue(":ativa", 1);
        $stmt->execute();
        $itens = $stmt->fetchAll();
        return $itens;
    }
    public function gestacao_finalisada($agente){
        $pdo = getConnect();
        $sql = "SELECT * FROM gestante WHERE agente_responsavel = :agente && gestacao_ativa = :ativa";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":agente", $agente);
        $stmt->bindValue(":ativa", 0);
        $stmt->execute();
        $itens = $stmt->fetchAll();
        return $itens;
    }
    

    public function inf_gestante($id){
        $pdo = getConnect();
        $sql = "SELECT * FROM gestante WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $itens = $stmt->fetchAll();
        return $itens;
    }

    public function finaliza_gestacao($id, $data_final){
        $pdo = getConnect();
        $sql = "UPDATE gestante SET gestacao_ativa = :ativo, fim_gestacao = :fim_gestacao WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindValue(":ativo", false);
        $stmt->bindValue(":fim_gestacao", $data_final);
        $stmt->bindValue(":id", $id);
        $retorno = $stmt->execute();
        return $retorno;
    }
    public function atualiza_gestante($id, $nome, $cns, $nasc, $dum){
        $pdo = getConnect();
        $sql = "UPDATE gestante SET nome = :nome, cns = :cns, nasc = :nasc, dum = :dum WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":cns", $cns);
        $stmt->bindValue(":nasc", $nasc);
        $stmt->bindValue(":dum", $dum);
        $stmt->bindValue(":id", $id);
        $retorno = $stmt->execute();
        return $retorno;
    }




    #nome
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    } 
    #cns
    public function getCns(){
        return $this->cns;
    }
    public function setCns($cns){
        $this->cns = $cns;
        return $this;
    }
    #nasc
    public function getNasc()
    {
        return $this->nasc;
    }
    public function setNasc($nasc){
        $this->nasc = $nasc;
        return $this;
    }
    #dum
    public function getDum(){
        return $this->dum;
    }
    public function setDum($dum){
        $this->dum = $dum;
        return $this;
    }
}