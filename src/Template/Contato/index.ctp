<h1>Formulário para contato</h1>

<?php
    echo $this->Form->create($contato);
    echo $this->Form->input('nome');
    echo $this->Form->input('email');
    echo $this->Form->input('msg');
    echo $this->Form->button('Enviar');
    echo $this->Form->end();
?>