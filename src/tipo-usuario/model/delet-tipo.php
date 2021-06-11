<?php

  // Conectando com o banco de dados
  include('../../conexao/conn.php');

  // Buscando o IDTIPO_USUARIO do banco
  $IDTIPO_USUARIO = $_REQUEST['IDTIPO_USUARIO'];

  // Query para excluxão
  $sql = "DELETE FROM TIPO_USUARIO WHERE IDTIPO_USUARIO = $IDTIPO_USUARIO";

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
