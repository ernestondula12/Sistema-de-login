<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "sistema"; 
    $port = 3306;

    try{
      //conexão com a porta
      $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

      //echo 'conexão com banco de dados realizado com sucesso.';

    }catch(PDOException $erro){

        echo 'Erro: conexão com banco de dados não realizado com susceso. Erro gerando' . $erro->getMessage();
    }


?>