<?php declare(strict_types=1);

function q($v)
{
    return db::connect()->quote($v);
}

class db
{
    private static $factory;
    private static $instance;

    static function connect(): PDO
    {
        if (!self::$instance) {
            self::$instance = (self::$factory)();
        }
        return self::$instance;
    }

    static function use($factory)
    {
        self::$factory = $factory;
    }

    static function list(sql\entity $sql)
    {
        return self::connect()->query($sql->list());
    }
}
