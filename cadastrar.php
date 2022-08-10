<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar vaga'); // O título muda de acordo com a pagina

//Chama a classe vaga.
use \App\Entity\Vaga;
use \App\Session\Login;

//OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

//INSTANCIA DE VAGA
//Cria um objeto da classe Vaga.
$obVaga = new Vaga;

//VALIDAÇÃO DO POST.
//se todas as informações do post estiverem preenchidas.

if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    


//Recebe as informações por post e coloca no objeto de vaga.
$obVaga->titulo    = $_POST['titulo'];
$obVaga->descricao = $_POST['descricao'];
$obVaga->ativo     = $_POST['ativo'];

//Chama a função para cadstrar
$obVaga->cadastrar();

//Redireciona para o index após o formulário ser enviado
header('location: index.php?status=success');
exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';