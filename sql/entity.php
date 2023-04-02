<?php declare(strict_types=1);

namespace sql;

abstract class entity
{
    protected $db;

    function __construct(\PDO $db = null)
    {
        $this->db = $db ?? \db::connect();
    }

    abstract function list();
}
