<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//OBRIGA O USUÁRIO A NÃO ESTAR LOGADO
Login::requireLogout();

//MENSAGENS DE ALERTAS DOS FORMULÁRIOS
$alertaLogin = '';
$alertaCadastro = '';

//VALIDAÇÃO DO POST
if (isset($_POST['acao'])) {

    switch ($_POST['acao']) {

        case 'logar':

            //BUSCA USUÁRIO POR E-MAIL
            $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

            //VALIDADA A INSTANCIA E A SENHA
            //Se não for uma instancia de usuário ou a senha digitada não bater com a do hash não continua e passa uma mensagem de alerta
            if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'],$obUsuario->senha)){
                $alertaLogin = 'E-mail ou senha inválidos';
                break;
            }

           //LOGA USUÁRIO
            Login::login($obUsuario);

            break;

        case 'cadastrar':

           //VALIDAÇÃO DOS CAMPOS OBRIGATÓRIOS
            if(isset($_POST['nome'],$_POST['email'],$_POST['senha'])){

                 //BUSCA USUÁRIO POR E-MAIL
                 //Se tentar cadastrar um e-mail já cadastrado cai no alerta e não faz nada
                 $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);
                 if($obUsuario instanceof Usuario){
                    $alertaCadastro = 'O e-mail digitado já está em uso';
                    break;
                 }
                
                //NOVO USUÁRIO
                //Cria um objeto de usuário
                $obUsuario = new Usuario;

                $obUsuario->nome  = $_POST['nome'];
                $obUsuario->email = $_POST['email'];

                //Cria uma hash para a senha do usuario 
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

                //Chama a função (método) para cadastra o usuário np BD
                $obUsuario->cadastrar();

                //LOGA USUÁRIO
                Login::login($obUsuario);
                
            }

            break;
    }
}



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';
