<?php
if(isset($saida)){}else{
    echo"<script>window.location.href='../sair.php'</script>";
}
    require_once("arquivos/conexao.php");
    class agente{
        private $nome;
        private $senha;
        private $prioridade;

            public function select($nome, $senha){
                $pdo = getConnect();
                $sql = "SELECT * FROM agente_saude WHERE nome = :nome && senha = :senha";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":nome", $nome);
                $stmt->bindValue(":senha", $senha);
                $res = $stmt->execute();
                $itens = $stmt->fetchAll();
                return $itens;
            }
        #GETTERS E SETTERS
        #nome
        public function getNome(){
            return $this->nome;
        } 
        public function setNome($nome){
            $this->nome = $nome;
             return $this;
        }   
        #senha
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        return $this;
        }
        #prioridade
        public function getPrioridade(){
            return $this->prioridade;
        }
        public function setPrioridade($prioridade){
            $this->prioridade = $prioridade;
            return $this;
        }
    }