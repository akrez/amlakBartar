<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ImagesTableMigration extends AbstractMigration
{
      public function up()
      {
            $table = $this->table('images');
            $table->addColumn('melk_id', 'integer', ['signed' => false, 'null' => false])
                  ->addColumn('image', 'string', ['limit' => 50, 'null' => false])
                  ->addForeignKey('melk_id', 'realestate', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);
            $table->save();
      }

      public function down()
      {
      }
}
