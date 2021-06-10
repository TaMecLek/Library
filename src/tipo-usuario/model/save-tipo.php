<?php

    // usando a conexão com o banco de dados para salvar os tipos de users
    include('../../conexao/conn.php');

    // Obtendo os dados enviados do form via REQUEST
    $requestData = $_REQUEST;

    // verificando se os dados vieram vazios
    if(empty($requestData['DESCRICAO'])){
        // Gerando um retorno de erro
        $dados = array(
            "tipo" => "error",
            "mensagem" => "Existem campos obrigatórios não preenchidos"
        );
    }else{
        // Gerando uma requisição de dados
        $IDTIPO_USUARIO = isset($requestData['IDTIPO_USUARIO']) ? $requestData['IDTIPO_USUARIO'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verificaçãos do resgistro, se é novo, cria, se e velho edita
        if($operacao == 'insert'){
            try {
                $stmt = $pdo->prepare('INSERT INTO TIPO_USUARIO (DESCRICAO) VALUES (:descricao)');
                $stmt -> execute(array(
                    ':descricao' => utf8_decode($requestData['DESCRICAO'])
                ));
                $dados = array(
                    "tipo" => "successes",
                    "mensagem" => "Tipo de usuário cadastrado com sucesso."
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => "error",
                    "mensagem" => "Não foi possivel criar o cadastro, tente novamente"
                );
            }
        }else {
            try {
                $stmt = $pdo->prepare('UPDATE TIPO_USUARIO SET DESCRICAO = :descricao WHERE IDTIPO_USUARIO = :id');
                $stmt -> execute(array(
                    ':id' => $IDTIPO_USUARIO,
                    ':descricao' => utf8_decode($requestData['DESCRICAO'])
                ));
                $dados = array(
                    "tipo" => "successes",
                    "mensagem" => "Tipo de usuário alterado com sucesso."
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => "error",
                    "mensagem" => "Não foi possivel atualizar o cadastro, tente novamente"
                );
            }
        }
    }

    // Enviar o $dados via Json
    echo json_encode($dados);