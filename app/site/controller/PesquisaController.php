<?php

namespace app\site\controller;

use app\core\Controller;
use app\site\model\ReceitaModel;

class PesquisaController extends Controller {
    public function __construct()
    {
     
    }

    public function index(){
        echo 'Pagina nao existe';
    }

    public function p(string $termo){

        $termo = filter_var($termo, FILTER_SANITIZE_STRING);
        $termo = strip_tags($termo);

        if(strlen(trim($termo)) <=2){
            $this->showMessage(
                'Pesquisa inválida',
                'Os dados fornecidos estao incompletos ou sao invalidos.',
                '',
                404
            );
            return;
        }

        $receitas =  (new ReceitaModel())->pesquisar($termo);
        $this->load('pesquisa/main',[
            'receitas' => $receitas,
            'termos' => $termo,
            'quantidadeResultado' => count($receitas)
        ]);
    }
}