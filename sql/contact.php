<?php declare(strict_types=1);

namespace sql;

class contact extends entity
{
    function list()
    {
        return <<<SQL
            SELECT 'Bob' AS name UNION ALL SELECT 'Alice'
        SQL;
    }
}
