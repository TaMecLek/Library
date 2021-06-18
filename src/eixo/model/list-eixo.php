<?php

// Conectando com o banco de dados
include('../../conexao/conn.php');

// Pegando as informações via request e colocando dentro da $requestData
$requestData = $_REQUEST;

// Pegando as colunas de dentro da $requestData
$colunas = $requestData['columns'];

// Preparado a consulta do banco de dados
$sql = "SELECT IDEIXO, NOME FROM EIXO WHERE 1=1";

// Pegando o total de registros do banco
$resultado = $pdo->query($sql);
$qtdeLinhas = $resultado->rowCount();

// Verificando se existe algum filtro
$filtro = $requestData['search']['value'];
if(!empty($filtro)){
    // Montanado a lógica pra executar o filtro
    // e determinando quais colunas são parte da nossa pesquisa
    $sql .= " AND (IDEIXO LIKE '%$filtro%' ";
    $sql .= " OR NOME LIKE '%$filtro%') " ;
}

// Pegando o total de dados filtrados
$resultado = $pdo->query($sql);
$totalFiltrados = $resultado->rowCount();

// Criando a lógica de ordem dos dados pra tela
$colunaOrdem = $requestData['order'][0]['column']; // Achando a posição da coluna que será ordenada
$ordem = $colunas[$colunaOrdem]['data']; // Achando o nome da coluna que será ordenada
$direcao = $requestData['order'][0]['dir']; // Achando a direção que será ordenado na tela

// Criando limites para os dados que irão aparecer na tela
$inicio = $requestData['start']; // Determinando o inicio do limite de dados
$tamanho = $requestData['length']; // Determinando o fim do limite

// Criando a query de ordem e limite dos dados
$sql .= " ORDER BY $ordem $direcao LIMIT $inicio, $tamanho ";
$resultado = $pdo->query($sql);
$dados = array();
while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
    $dados[] = array_map('utf8_encode', $row);
}

// Criando o Json do DataTables
$json_data = Array(
    "draw" => intval($requestData['draw']),
    "recordsTotal" => intval($qtdeLinhas),
    "recordsFiltered" => intval($totalFiltrados),
    "data" => $dados
);

// Enviando o Json
echo json_encode($json_data);