<?php

  use \App\Session\Login;

  //DADOS DO USUARIO LOGADO
  $usuarioLogado = Login::getUsuarioLogado();

  //DETALHES DO USUÁRIO
  $usuario = $usuarioLogado ?
             $usuarioLogado['nome'].'<a href="logout.php" class="text-light font-weight-bold ms-2">Sair</a>' :
             'Visitante <a href="login.php" class="text-light font-weight-bold ms-2">Entrar</a>';

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Final PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-dark text-light">

  <div class="container mt-1">

  <div class="jumbotron bg-danger rounded-2 p-4">
    <h1>Projeto Final</h1>
    <p>Projeto CRUD com PHP POO</p>

    <hr class="border-light">

    <div class="d-flex justify-content-start">
      <?=$usuario?>
    </div>
  </div>

 
   
    