<?php declare(strict_types=1);

function meta(array $data)
{
    page::$meta = array_merge(page::$meta, $data);
}

class page
{
    static $dir;
    static $meta = [
        'title' => 'Untitled'
    ];

    static function render($uri)
    {
        $path = self::$dir . $uri;
        if (is_dir($path)) {
            $path .= '/index';
        }
        $path .= '.php';

        if (!file_exists($path)) {
            http_response_code(404);
            $path = self::$dir . '/404.php';
        }

        ui::$slots = [];

        ob_start();
        include $path;
        return ui('layout', array_merge(self::$meta, ['body' => ob_get_clean()]));
    }
}
