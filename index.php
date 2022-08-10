<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;
use \App\Session\Login;

//OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

// Filtros de consulta

//BUSCA
//Vai filtrar as vagas com o que for recebido no campo de input e aceitará somente string
//Se a variavel ($busca) tiver valor irá mostrar se não o campo fica vazio
$busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

//FILTRO DE STATUS
//Vai filtrar as vagas pelo seu status
$filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_UNSAFE_RAW);
$filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : ''; //vai aceitar somente os valore do array

//CONDIÇÕES SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ','%',$busca).'%"' : null, //A % serve para indicar se tem qualquer coisa antes,depois ou entre a variavel
    strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];

//REMOVE POSIÇÕES VAZIAS
//vai remover as posições vazias de $condicoes para que a query não quebre
$condicoes = array_filter($condicoes);

//CLÁUSULA WHERE
$where = implode(' AND ',$condicoes);

//QUANTIDADE TOTAL DE VAGAS
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

//PAGINAÇÃO
//Se existir a página passa a página se não passa 1
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 5);

//OBTÉM AS VAGAS
$vagas = Vaga::getVagas($where,null,$obPagination->getLimit());


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';