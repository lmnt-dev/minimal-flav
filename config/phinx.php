<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/phinx/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/phinx/seeds',
    ],
    'templates' => [
        'file' => '%%PHINX_CONFIG_DIR%%/phinx/template.php',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'dev',
        'dev' => [
            'dsn' => 'mysql://local:local@db:3306/local?charset=utf8'
        ],
        'test' => [
            'adapter' => 'sqlite',
            'mode' => 'memory',
        ],
    ],
    'version_order' => 'creation'
];
