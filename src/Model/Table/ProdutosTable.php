<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

    class ProdutosTable extends Table {

        public function initialize(array $config){
            $this->belongsToMany('Clientes');
        }
        
        public function validationDefault(Validator $validator) {
            
            $validator->requirePresence('nome',true)->notEmpty('nome');
            $validator->add('descricao' , [
                'minLength'=>[
                    'rule'=>['minLength',10],
                    'message'=>'A descrição deve conter pelo menos 10 caracteres'
                ]
            ]);
            $validator->add('preco',[
                'decimal'=> [
                    'rule' => ['decimal', 2],
                    'message'=> 'Por favor digite um valor decimal separado por .'
                ]
            ]);
            return $validator;
        }
    }    
?>