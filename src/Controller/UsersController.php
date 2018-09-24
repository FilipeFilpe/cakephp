<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class UsersController extends AppController {
    public function beforeFIlter(Event $event) {
        parent::beforeFIlter($event);

        $this->Auth->allow(['adicionar', 'users']);
    }

    public function adicionar() {

        $userTable = TableRegistry::get('Users');

        $user = $userTable->newEntity();

        $this->set('user', $user);
    }

    public function salvar() {

        $userTable = TableRegistry::get('Users');

        $user = $userTable->newEntity($this->request->data());

        if ($userTable->save($user)) {
            $this->Flash->set('Usuário cadastrado com sucesso');
        } else {
            $this->Flash->set('Erro ao cadastrar usuário');
        }

        $this->redirect('Users/adicionar');
    }

    public function login() {
       if ($this->request->is('post')) {
           $user = $this->Auth->identify();

           if ($user) {
               $this->Auth->setUser($user);
               return $this->redirect($this->Auth->redirectUrl());
           } else {
               $this->Flash->set('Usuário ou senha inválidos',['element' => 'error']);
           }
       }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}