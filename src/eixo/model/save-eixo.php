<?php
    // usando a conexão com o banco de dados para salvar os tipos de users
    include('../../conexao/conn.php');

    // Obtendo os dados enviados do form via REQUEST
    $requestData = $_REQUEST;

    // verificando se os dados vieram vazios
    if(empty($requestData['NOME'])){
        // Gerando um retorno de erro
        $dados = array(
            "tipo" => "error",
            "mensagem" => "Existem campos obrigatórios não preenchidos"
        );
    } else {
        // Gerando uma requisição de dados
        $IDEIXO = isset($requestData['IDEIXO']) ? $requestData['IDEIXO'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        // Verificaçãos do resgistro, se é novo, cria, se e velho edita
        if($operacao == 'insert'){
            try {
                $stmt = $pdo->prepare('INSERT INTO EIXO (NOME) VALUES (:NOME)');
                $stmt->execute(array(
                    ':NOME' => utf8_decode($requestData['NOME'])
                ));
                $dados = array(
                    "tipo" => "success",
                    "mensagem" => "Tipo de usuário cadastrado com sucesso."
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => "error",
                    "mensagem" => "Não foi possivel criar o cadastro, tente novamente"
                );
            }
        } else {
            
            try {
                $stmt = $pdo->prepare('UPDATE EIXO SET NOME = :NOME WHERE IDEIXO = :id');
                $stmt->execute(array(
                    ':id' => $IDEIXO,
                    ':NOME' => utf8_decode($requestData['NOME'])
                ));
                $dados = array(
                    "tipo" => "success",
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