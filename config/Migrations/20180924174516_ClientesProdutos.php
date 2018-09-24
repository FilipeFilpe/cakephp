<?php
use Migrations\AbstractMigration;

class ClientesProdutos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('clientes_produtos');
        $table->addColumn('id_cliente', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('id_produto', 'integer', [
            'null' => false,
        ]);
        $table->create();
    }
}
