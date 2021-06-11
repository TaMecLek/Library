<?php

    // Conectando o banco
    include('../../conexao/conn.php');

    // Fazendo a recepção do IDTIPO_USUARIO  do banco via REQUEST
    $IDTIPO_USUARIO = $_REQUEST['IDTIPO_USUARIO'];

    // Fazendo a query de consulta ao banco
    $sql = "SELECT * FROM TIPO_USUARIO WHERE IDTIPO_USUARIO = $IDTIPO_USUARIO";

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
            'mensagem' => 'Ocorreu um erro, não foi possivel encontrar o tipo de usuario cadastrado',
            'dados' => array()
        );
    }

    echo json_encode($dados);