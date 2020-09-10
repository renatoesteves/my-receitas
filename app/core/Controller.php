<?php

namespace app\core;

class Controller{
    protected function load(string $view, $params = []){
        $twig = new \Twig\Environment((new \Twig\Loader\FilesystemLoader('../app/site/view/')),
        ['debug'=> false]
    );
        $twig-> addGlobal('BASE', BASE);
        echo $twig->render($view . '.twig.php', $params);
    }


    protected function showMessage(string $title, string $mensagem, string $uri, int $httpCode = 200) {
        http_response_code();
        $this->load('partials/mensagem', [
            'titulo'  =>$title,
            'mensagem'=>  $mensagem,
            'uri' =>  $uri
        ]);
    }
}
