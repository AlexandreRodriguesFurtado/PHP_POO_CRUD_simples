<?php

require __DIR__.'/vendor/autoload.php';



//Chama a classe Vaga.
use \App\Entity\Vaga;
use \App\Session\Login;

//OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

//VALIDAÇÃO DO ID
//Se não for um id ou um número volta para o index como erro

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//CONSULTA A VAGA
$obVaga = Vaga::getVaga($_GET['id']);

//VALIDAÇÃO DA VAGA
if(!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
} 



//VALIDAÇÃO DO POST
//se todas as informações do post estiverem preenchidas.

if(isset($_POST['excluir'])){
    

//Chama a função para excluir a vaga

$obVaga->excluir();

//Redireciona para o index após o formulário ser enviado
header('location: index.php?status=success');
exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';