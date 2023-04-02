<?php declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUserTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('user');

        $table->addColumn('created', 'datetime')
              ->create();

        if ($this->isMigratingUp()) {
            $table->insert([['id' => 1, 'created' => '2020-01-19 03:14:07']])
                ->save();
        }
    }
}
