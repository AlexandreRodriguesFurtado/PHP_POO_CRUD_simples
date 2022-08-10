<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

    /**
     * Indetificador único do usuário
     * @var interger
     */
    public $id;

    /**
     * Nome do usuário
     * @var string
     */
    public $nome;

    /**
     * E-mail do usuário
     * @var string
     */
    public $email;

    /**
     * Hash da senha do usuário
     * @var string
     */
    public $senha;

    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    /**
     * Função (método reponsável por cadastrar um novo usuário no banco)
     * @return boolean
     */
    public function cadastrar(){
        $obDatabase = new Database('usuarios');

        //INSERE UM NOVO USUÁRIO
        $this->id = $obDatabase->insert([
                                            'nome'  => $this->nome,
                                            'email' => $this->email,
                                            'senha' => $this->senha
                                        ]);
        //SUCESSO
        return true;
    }

    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

    /**
     * Função (método) responsável por retornar uma instancia de usuario com base em seu e-mail
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email){
        return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
   
}