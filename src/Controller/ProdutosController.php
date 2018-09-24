<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

class ProdutosController extends AppController {
    public $paginate = [
        'limit'=> 1
    ];

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Csrf');
    }

    public function index() {
        $produtosTable = TableRegistry::get('Produtos');
        $produtos = $produtosTable->find('all');

        $this->set('produtos', $this->paginate($produtos));
    }

    public function novo() {
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->newEntity();

        $this->set('produto', $produto);
    }

    public function editar($id) {

        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->get($id);

        $this->set('produto', $produto);
        $this->render('novo');
    }

    public function apagar($id) {

        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->get($id);

        if ($produtosTable->delete($produto)) {
            $msg = __("Produto removido com sucesso");
            $this->Flash->set($msg, ['element'=>'error']);
        } else {
            $msg = __("Erro ao deletar produto");
            $this->Flash->set($msg);
        }
        $this->redirect('Produtos/index');
    }

    public function salva() {

        $request = $this->request->data();
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->newEntity($request);

        if (!$produto->errors() && $produtosTable->save($produto)) {
            $msg = __("Produto salvo com sucesso");
            $this->Flash->set($msg, ['element'=>'success']);
        } else {
            $msg = __("Erro ao salvar produto");
            $this->Flash->set($msg, ['element'=>'error']);
        }

        $this->set('produto', $produto);
        $this->render('novo');
    }
}