<?php

namespace App\Db;

class Pagination{

    /**
     * Número maximo de registro por página
     * @var integer
     */
    private $limit;

    /**
     * Quantidade total de resultados do BD
     * @var integer
     */
    private $results;

    /**
     * Quantidades de páginas
     * @var integer
     */
    private $pages;

    /**
     * Página atual
     * @var integer
     */
    private $currentPage;

    /**
     * Construtor da classe
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    public function __construct($results,$currentPage = 1,$limit = 10)
    {
        $this->results     = $results;
        $this->limit       = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    /**
     * Função (método) responsavel por calcular a paginação)
     */ 
    private function calculate(){
        //CALCULA O TOTAL DE PÁGINAS
        //Se o results de páginas não for maior que zero ou se der um numero quebrado ele arredonda
        // caso for menor que 1 ele devolve 1
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) :1;

        //VERIFICA SE A PÁGINA ATUAL NÃO EXCEDE O NÚMERO DE PÁGINAS
        //Se a pagina atual for menor ou igual ao total de página ele continua na página
        // se não ele recebe a ultima
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Função (método) responsável por retornar a cláusula limit da SQL
     * @return string
     */
    public function getLimit(){
        //vai contar o numero de registro para poder passar para a proxima pagina
        $offset = ($this->limit *($this->currentPage - 1));
        return $offset.','.$this->limit;

    }

    /**
     * Função (método) responsável por retornar as opções de páginas disponiveis
     * @return array
     */
    public function getPages(){
        //NÃO RETORNA PÁGINAS
        //Se tiver uma página não retorna nada
        if($this->pages == 1) return [];

        //PÁGINAS
        //Começa contando a primeira página se a pagina for menor ou igual a 1 o contador recebe mais 1
        //A variavel $paginas recebe detro do array o valor do contador e o valor é o número da página
        $paginas = [];
        for($i = 1; $i <= $this->pages; $i++){
            $paginas[] = [
                'pagina' => $i,
                'atual'  => $i == $this->currentPage
            ];
        }

        return $paginas;
    }

}