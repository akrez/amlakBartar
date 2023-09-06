<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CommentsTableMigration extends AbstractMigration
{
    public function up()
      {
            $table = $this->table('comments');
            $table->addColumn('user_id', 'integer', ['signed' => false, 'null' => false])
                  ->addColumn('name', 'string', ['limit' => 30, 'null' => false])
                  ->addColumn('email', 'string', ['limit' => 30, 'null' => false])
                  ->addColumn('description', 'text', ['null' => false])
                  ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);
            $table->save();
      }

      public function down()
      {
      }
}
