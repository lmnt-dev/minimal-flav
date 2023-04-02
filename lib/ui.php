<?php declare(strict_types=1);

function repeat($name, $data, callable $map = null)
{
    if (!is_array($data)) {
        $data = iterator_to_array($data);
    }
    return implode(array_map(
        fn ($x) => ui($name, $x),
        $map ? array_map($map, $data) : $data
    ));
}

function slot($key, ...$content)
{
    if (!array_key_exists($key, ui::$slots)) {
        ui::$slots[$key] = [];
    }
    array_push(ui::$slots[$key], ...$content);
}

function ui($name, $data = null, $body = null)
{
    if (is_string($data)) {
        $body = $data;
        $data = null;
    }

    ob_start();

    $ops = ui::emit($name, $data);

    $attr = [];
    foreach ($ops as $op) {
        if (is_array($op)) {
            foreach ($op as $key => $val) {
                $attr[$key] = isset($attr[$key]) ? "$attr[$key] $val" : $val;
            }
        } else if (!$op) {
            ob_end_clean();
            return '';
        }
    }

    $attr = implode(' ', array_map(
        fn ($key, $val) => " $key=\"$val\"",
        array_keys($attr),
        $attr
    ));

    foreach (ui::$aliases as $alias => $path) {
        if (strpos($name, $alias) !== false) {
            $name = strtr($name, [$alias => $path]);
        }
    }

    $path = __DIR__ . "/../ui/$name";
    if (is_dir($path)) {
        $path .= '/main';
    }
    $path .= '.php';

    if (is_file($path)) {
        is_array($data) && extract($data);
        include $path;
    } else {
        echo "<$name$attr>$body</$name>";
    }

    ui::emit("/$name", $data);
    
    return ob_get_clean();
}

class ui
{
    static $aliases = [];
    static $listeners = [];
    static $slots = [];
    static $uses = [];

    static function emit($event, $data = null)
    {
        $ops = [];
        foreach (self::$listeners as [$match, $listener]) {
            if ($match($event, $data)) {
                $ops[] = is_callable($listener) ? $listener($event, $data) : $listener;
            }
        }
        return $ops;
    }

    static function on($match, $listener)
    {
        self::$listeners[] = [$match, $listener];
    }

    static function slot($key, $join = "\n")
    {
        if (!array_key_exists($key, self::$slots)) {
            return '';
        }
        return implode($join, self::$slots[$key]);
    }

    static function use($id)
    {
        self::$uses[$id] = true;
    }

    static function uses($id)
    {
        return array_key_exists($id, self::$uses);
    }
}
