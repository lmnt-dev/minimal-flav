<?php declare(strict_types=1);

page::$dir = __DIR__ . '/../pages';

db::use(fn() => new PDO('sqlite::memory:', '', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]));
