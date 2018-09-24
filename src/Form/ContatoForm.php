<?php

namespace App\Form;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Network\Email\Email;

class ContatoForm extends Form
{
    public function _buildSchema(Schema $schema) {
        $schema->addField('nome', 'string');
        $schema->addField('email', 'string');
        $schema->addField('msg', 'text');

        return $schema;
    }
    
    public function _buildValidator(Validator $validator) {
        $validator->add('msg', [
            'minLength'=>[
                'rule' => ['minLength',10],
                'message'=>'A mensagem precisa ter pelo menos 10 letras'
            ]
        ]);
        $validator->notEmpty('nome');
        $validator->notEmpty('email');
        return $validator;
    }

    public function _execute(array $data) {
        $email = new Email('gmail');
        $email->to('filpess@hotmail.com');
        $email->subject('Contato feito pelo site');
        $msg = "Contato feito pelo site <br>
                Nome: {$data['nome']}<br>
                Email: {$data['email']}<br>
                Mensagem: {$data['msg']}<br>";

        return $email->send($msg);                
    }
}
