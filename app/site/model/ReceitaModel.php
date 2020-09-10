<?php

namespace app\site\model;

use app\core\Model;
use app\site\entities\Receita;

class ReceitaModel{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function inserir(Receita $receita)
    {
        $sql = 'INSERT INTO receita  (titulo,slug,linha_fina,descricao,categoria_id,data) VALUES (:titulo,:slug,:linha_fina,:descricao,:categoria_id,:data)';
        $params = [
            ':titulo' => $receita->getTitulo(),
            ':slug'=> $receita->getSlug(),
            ':linha_fina' => $receita->getLinhaFina(),
            ':descricao'=> $receita->getDescricao(),
            ':categoria_id' => $receita->getCategoriaId(),
            ':data' => $receita->getData(),
        ];

        if(!$this->pdo->executeNonQuery($sql,$params))
            return -1;

        return $this->pdo->getLastID();
    }


    public function alterar(Receita $receita)
    {
        $sql = 'UPDATE receita SET titulo = :titulo ,slug = :slug ,linha_fina = :linha_fina ,descricao = :descricao ,categoria_id = :categoria_id WHERE id = :id';
        $params = [
            ':id' => $receita->getId(),
            ':titulo' => $receita->getTitulo(),
            ':slug'=> $receita->getSlug(),
            ':linha_fina' => $receita->getLinhaFina(),
            ':descricao'=> $receita->getDescricao(),
            ':categoria_id' => $receita->getCategoriaId()
        ];

        return $this->pdo->executeNonQuery($sql,$params);
            
    }


    private function collection ($arr)
    {
        $receita = new Receita();
        $receita->setId($arr['id'] ?? null);
        $receita->setTitulo($arr['titulo'] ?? null);
        $receita->setSlug($arr['slug'] ?? null);
        $receita->setLinhaFina($arr['linha_fina'] ?? null);
        $receita->setDescricao($arr['descricao'] ?? null);
        $receita->setCategoriaId($arr['categoria_id'] ?? null);
        $receita->setCategoriaTitulo($arr['cattitulo'] ?? null);
        $receita->setData($arr['data'] ?? null);
        return $receita;
    }

    public function lerPorId(int $receitaId)
    {
        $sql = 'SELECT * FROM receita WHERE id = :id';
        $dr= $this->pdo->executeQueryOneRow($sql,[ 
            ':id' => $receitaId
        ]);
    }

    public function lerPorCategoria(int $categoriaId)
    {
        $sql = 'SELECT r.*, c.titulo as cattitulo FROM receita r INNER JOIN categoria c ON c.id = r.categoria_id WHERE r.categoria_id = :categoriaid';
        $dt= $this->pdo->executeQueryOneRow($sql,[ 
            ':id' => $categoriaId
        ]);
            $lista = [];
            foreach($dt as $dr)
                $lista[] = $this->collection($dr);
            return $lista;

        return $this->collection($dr);
    }
}