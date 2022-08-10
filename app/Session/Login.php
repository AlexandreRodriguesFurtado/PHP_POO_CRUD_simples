<?php

namespace App\Session;

class Login
{

    /**
     * Função (método) responsável por iniciar a sessão
     */
    //A função (método) é privado porque só a propia classe vai usar
    private static function init()
    {
        //VERIFICA O STATUS DA SESSÃO
        //Se o status da sessão não for diferente da constante do php a sessão inicia 
        if (session_status() !== PHP_SESSION_ACTIVE) {
            //INICIA A SESSÃO
            session_start();
        }
    }


    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


    /**
     * Função (método) responsável por retornar os dados do usuário logado
     * @return array
     */
    public static function getUsuarioLogado(){
        //INICIA A SESSÃO
        self::init();

        //RETORNA DADOS DO USUÁRIO
        //Se o usuário estver logado retorna os dados do usuário se não é nulo
        return self::isLogged() ? $_SESSION['usuario'] : null;

    }


    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


    /**
     * Função (método) responsável por logar o usuário
     * @param Usuario $obUsuario
     */
    public static function login($obUsuario)
    {
        //INICIA A SESSÃO
        self::init();

        //SESSÃO DE USUÁRIO
        //A SESSION e um array global que pode ser usado em todo o sistema
        // e vai guardar as informações do array até terminar a sessão
        $_SESSION['usuario'] = [
                                'id'   => $obUsuario->id,
                                'nome' =>$obUsuario->nome,
                                'email'=>$obUsuario->email
                                ];
        
        //REDIRECIONA USUARIO PARA INDEX
        header('location: index.php');
        exit;
    }

    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


    /**
     * Função (método) responsável por deslogar o usuário
     */
    public static function logout(){
        //INICIA A SESSÃO
        self::init();

        //REMOVE A SESSÃO DE USUÁRIO
        unset($_SESSION['usuario']);

        //REDIRECIONA USUÁRIO PARA LOGIN
        header('location: login.php');
        exit;
    }

    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


    /**
     * Função (método) responsável por verificar se o usuário está logado
     * @return boolean 
     */
    public static function isLogged()
    {
        //INICIA A SESSÃO
        self::init();

        //VALIDAÇÃO DA SESSÃO
        //Se a SESSION tiver o usuário e o id preenchido o usuário está logado
        return isset($_SESSION['usuario']['id']);
    }

    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


    /**
     * Função (método) responsável por obrigar o usuário a estar logado para acessar
     */
    //Se estiver logado não faz nada se não volta para a tela de login
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            header('location: login.php');
            exit;
        }
    }

    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    

    /**
     * Função (método) responsável por obrigar o usuário a estar deslogado para acessar
     */
    //Se estiver logado manda o usuario para o index
    public static function requireLogout()
    {
        if (self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}
