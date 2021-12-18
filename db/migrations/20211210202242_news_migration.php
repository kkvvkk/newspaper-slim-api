<?php

use Phinx\Migration\AbstractMigration;

class NewsMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // create the table
        $table = $this->table('news');
        $table->addIndex(['id'], ['unique' => true])
            ->addColumn('title', 'string', ['limit' => 200, 'null' => false])
            ->addColumn('anons', 'string', ['limit' => 200])
            ->addColumn('text', 'text', ['null' => false])
            ->addColumn('author_id', 'integer', ['null' => false])
            ->addColumn('rubric_id', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
    }
}
