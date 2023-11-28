<?php
    function conectaBD(){
        $servername = "localhost";
        $database = "lavagem";
        $username = "root";
        $password = "";

        // criar a conexao
        $conexao = mysqli_connect($servername, $username, $password, $database);

        if(!$conexao){
            die("Conexão Falhou!".mysqli_connect_error());
        }
        else{
        }
        return($conexao);
    } // final da função

    function desconectaBD($conexao){
        mysqli_close($conexao);
    }
?>