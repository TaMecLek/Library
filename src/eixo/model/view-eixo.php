<?php

    // Conectando o banco
    include('../../conexao/conn.php');

    // Fazendo a recepção do IDEIXO  do banco via REQUEST
    $IDEIXO = $_REQUEST['IDEIXO'];

    // Fazendo a query de consulta ao banco
    $sql = "SELECT * FROM EIXO WHERE IDEIXO = $IDEIXO";

    // Executando a query de consulta ao banco
    $resultado = $pdo->query($sql);

    // Testando o retorno da consulta ao banco
    if($resultado){
        $dadosTipo = array();
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $dadosTipo = array_map('utf8_encode', $row);
        }
        $dados = array(
            'tipo' => 'success',
            'mensagem' => '',
            'dados' => $dadosTipo
        );
    } else {
        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Ocorreu um erro, não foi possivel encontrar o eixo tecnologico cadastrado',
            'dados' => array()
        );
    }

    echo json_encode($dados);