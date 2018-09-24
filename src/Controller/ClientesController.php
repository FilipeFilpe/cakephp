<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;

class ClientesController extends AppController
{
    public function index()
    {
        $clientesTable = TableRegistry::get('Clientes');
        $clientes = $clientesTable->find('all')->contain(['Produtos']);    
        $this->set('clientes', $clientes);
    }

    public function novo()
    {
        $clientesTable = TableRegistry::get('Clientes');
        $cliente = $clientesTable->newEntity();

        $this->set('cliente', $cliente);
    }

    public function salva()
    {
        $request = $this->request->data();
        $clientesTable = TableRegistry::get('Clientes');
        $cliente = $clientesTable->newEntity($request);

        if ($clientesTable->save($cliente)) {
            $msg = __("Cliente salvo com sucesso");
            $this->Flash->set($msg, ['element'=>'success']);
        } else {
            $msg = __("Erro ao salvar Cliente");
            $this->Flash->set($msg, ['element'=>'error']);
        }

        $this->set('cliente', $cliente);
        $this->redirect('clientes/index');
    }
}
