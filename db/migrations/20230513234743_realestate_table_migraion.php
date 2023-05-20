<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class RealestateTableMigraion extends AbstractMigration
{
        public function up()
        {
                $table = $this->table('realestate');
                $table->addColumn('owner', 'string', ['limit' => 30, 'null' => false])
                        ->addColumn('phone', 'integer', ['signed' => false, 'null' => false])
                        ->addColumn('Address', 'text', ['null' => false])
                        ->addColumn('Construction', 'integer', ['signed' => false, 'null' => false])
                        ->addColumn('Meterage', 'integer', ['signed' => false, 'null' => false])
                        ->addColumn('Direction', 'string', ['limit' => 10, 'null' => false])
                        ->addColumn('Floors', 'integer', ['signed' => false, 'null' => false])
                        ->addColumn('units', 'integer', ['signed' => false, 'null' => false])
                        ->addColumn('Floor', 'integer', ['signed' => false, 'null' => false])
                        ->addColumn('Elevator', 'boolean', ['default' => false])
                        ->addColumn('Parking', 'boolean', ['default' => false])
                        ->addColumn('description', 'text', ['null' => true])
                        ->addColumn('Sell_rent', 'string', ['limit' => 10, 'null' => false])
                        ->addColumn('Location', 'string', ['limit' => 255, 'null' => true]);
                $table->save();
        }

        public function down()
        {
                $this->table('images')->drop()->save();
                $this->table('realestate')->drop()->save();
        }
}
