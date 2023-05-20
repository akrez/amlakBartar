<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UsersTableMigration extends AbstractMigration
{
        public function up()
        {
                $table = $this->table('users');
                $table->addColumn('name', 'string', ['limit' => 30, 'null' => false])
                        ->addColumn('email', 'string', ['limit' => 30, 'null' => false])
                        ->addColumn('password', 'string', ['limit' => 60, 'null' => false]);
                $table->save();
        }

        public function down()
        {
        }
}
