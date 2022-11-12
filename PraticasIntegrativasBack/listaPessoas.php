<?php
    session_start(); 
           
    include_once("conexaoBanco.php");    
    $result_usuario = "SELECT * FROM pessoas";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        if(isset($resultado)){
            echo("Tem retorno!");
        }
        else{
            echo("Não Tem retorno!");
        }
        
?>