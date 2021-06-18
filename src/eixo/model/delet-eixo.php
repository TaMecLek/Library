<?php

  // Conectando com o banco de dados
  include('../../conexao/conn.php');

  // Buscando o IDEIXO do banco
  $IDEIXO = $_REQUEST['IDEIXO'];

  // Query para excluxão
  $sql = "DELETE FROM EIXO WHERE IDEIXO = $IDEIXO";

  // Execultando a excluxão
  $resultado = $pdo->query($sql);

  // Testando o resultado
  if ($resultado) {
    $dados = array(
      'tipo' => 'success',
      'mensagem' => 'Registro deletado, sucesso!'
    );
  }else{
    $dados = array(
      'tipo' => 'error',
      'mensagem' => 'Registro não deletado, falha!'
    );
  };

  echo json_encode($dados);
