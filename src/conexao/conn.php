<?php

    $hostmane = "fdb30.awardspace.net";
    $dbname = "3807733_library";
    $username = "3807733_library";
    $password = "uuTbr9yA2OJ_dd5+";

    try {
        $pdo = new PDO('mysql:host='.$hostmane.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Conexão Bem Sucedida';
    } catch (PDOException $e) {
        echo 'Conexão Mal Sucedida, Erro: '.$e->getMessage();
    }