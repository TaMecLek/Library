<?php

    $hostmane = "fdb29.awardspace.net";
    $dbname = "3802844_library";
    $username = "3802844_library";
    $password = "3:h:2+V87HR]3gok";

    try {
        $pdo = new PDO('mysql:host='.$hostmane.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Conexão Bem Sucedida';
    } catch (PDOException $e) {
        echo 'Conexão Mal Sucedida, Erro: '.$e->getMessage();
    }