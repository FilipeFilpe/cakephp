<h1>Novo Cliente</h1>

<?php
    echo $this->Form->create($cliente, ['action'=>'salva']);
    echo $this->Form->input('nome');
    echo $this->Form->input('cpf');
    echo $this->Form->button('Gravar');
    echo $this->Form->end();
?>