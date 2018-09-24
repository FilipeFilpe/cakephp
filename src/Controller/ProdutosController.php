<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

class ProdutosController extends AppController {

    public function index() {
        $produtosTable = TableRegistry::get('Produtos');
        $produtos = $produtosTable->find('all');

        $this->set('produtos', $produtos);
    }

    public function novo() {
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->newEntity();

        $this->set('produto', $produto);
    }

    public function salva() {

        $request = $this->request->data();
        $produtosTable = TableRegistry::get('Produtos');
        $produto = $produtosTable->newEntity($request);

        if ($produtosTable->save($produto)) {
            $msg = "Produto salvo com sucesso";
            $this->Flash->set($msg, ['element'=>'success']);
        } else {
            $msg = "Erro ao salvar produto";
            $this->Flash->set($msg, ['element'=>'error']);
        }

        $this->redirect('Produtos/index');
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
            $msg = "Produto removido com sucesso";
            $this->Flash->set($msg, ['element'=>'error']);
        } else {
            $msg = "Erro ao deletar produto";
            $this->Flash->set($msg);
        }
        $this->redirect('Produtos/index');
    }
}