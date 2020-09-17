<?php 
    session_set_cookie_params(PHP_INT_MAX);
    session_start();
    $saida = 1;
    if(isset($_SESSION['nome']) && $_SESSION['prioridade'] == 1){
    echo "<h1 id='cab'> ".$_SESSION['nome']."</h1><br>";
     ?>

<div id="menu" onclick="menur()">
</div>
    <script>
            var sit = 0;
            function menur(){
                if(sit == 0){
                    document.getElementById("lista").style.display = "block";
                    sit = 1;
                }else{
                    document.getElementById("lista").style.display = "none";
                    sit = 0;
                }    
            }
        </script>
        <?php
    }
    else if(isset($_SESSION['nome']) && $_SESSION['prioridade'] == 2){
        echo "<script> window.location.href='../admin' </script>";
    }else{
        echo "<script> window.location.href='login.php' </script>";
    }