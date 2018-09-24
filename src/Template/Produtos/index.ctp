<table class=”table”>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Preço com desconto</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($produtos as $produto) { ?>
        <tr>
            <td><?= $produto["id"]; ?></td>
            <td><?= $produto["nome"]; ?></td>
            <td><?= $this->Money->format($produto["preco"]); ?></td>
            <td><?= $this->Money->format($produto->calculaDesconto()); ?></td>
            <td><?= $produto["descricao"]; ?></td>
            <td>
                <?php
                    echo $this->Html->Link('Editar', ['controller'=>'produtos',
                        'action'=>'editar', $produto['id']]);
                ?>
                <?php
                    echo $this->Form->postLink('Apagar', ['controller'=>'produtos',
                        'action'=>'apagar', $produto['id']],
                        ['confirm'=>'Tem certeza que deseja apagar o produto '.$produto['nome'].'?']);
                ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
    echo $this->Html->Link('Novo Produto', ['controller'=>'produtos', 'action'=>'novo']);
    echo $this->Html->Link('Logout', ['controller'=>'Users', 'action'=>'logout']);
?>