<?php
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
            public function apagar($id){
                $pdo = getConnect();
                $sql = "DELETE FROM agente_saude WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":id", $id);
                $res = $stmt->execute();
                return $res;
            }
            public function select_id($id){
                $pdo = getConnect();
                $sql = "SELECT * FROM agente_saude WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":id", $id);
                $res = $stmt->execute();
                $itens = $stmt->fetchAll();
                return $itens;
            }
            public function select_nome($nome){
                $pdo = getConnect();
                $sql = "SELECT * FROM agente_saude WHERE nome = :nome";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":nome", $nome);
                $res = $stmt->execute();
                $itens = $stmt->fetchAll();
                $num = count($itens);
                return $num;
            }
            public function retorna_agentes(){
                $pdo = getConnect();
                $sql = "SELECT * FROM agente_saude WHERE prioridade = :pri";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":pri", 1);
                $stmt->execute();
                $itens = $stmt->fetchAll();
                return $itens;
            }
            public function cadastra_agente($nome, $senha, $pri){
                $pdo = getConnect();
                $sql = "INSERT INTO agente_saude (nome, senha, prioridade)VALUES(:nome, :senha, :prioridade)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":nome", $nome);
                $stmt->bindValue(":senha", $senha);
                $stmt->bindValue("prioridade", $pri);
                $res = $stmt->execute();
                return $res;
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