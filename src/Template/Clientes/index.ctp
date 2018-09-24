
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Produto | Preço</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente) { ?>
            <tr>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['cpf'] ?></td>
                <td>
                    <table>
                        <?php $produtos = $cliente['produtos']; 
                            foreach ($produtos as $produto) {
                                if ($produto['nome'] == null) { ?>
                                    <td>Senhum consumo</td>
                                <?php } else { ?>
                                <tr>
                                    <td><?= $produto['nome']; ?></td>
                                    <td><?= $produto['preco']; ?></td>
                                </tr>

                                <?php $this->Total->precoTotal($produto['preco']); ?>
                            <?php } ?>
                        <?php } ?>
                                <td><?= $this->Total->getPrecoTotal(); ?></td>
                            </tr>
                    </table>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php
    echo $this->Html->Link('Adicionar Cliente', ['controller'=>'clientes', 'action'=>'novo']);
?>