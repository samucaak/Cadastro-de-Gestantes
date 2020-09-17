<?php
    function getConnect(){
        $dbs="mysql:host=localhost; dbname=cadastro_pacientes";
        $usr="root";
        $pass="";
        
        try {
            $pdo = new PDO($dbs, $usr, $pass);
            return $pdo;
        } catch (\PDOException $th) {
            echo $th->getMessage();
        }
    }

