<?php declare(strict_types=1);

if (!empty($_SERVER['REQUEST_URI'])) {
    define('URI', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

if (defined('URI') && php_sapi_name() == 'cli-server') {
    if (URI !== '/' && file_exists(__DIR__ . URI)) {
        return false;
    }
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/site.php';

if (defined('URI')) {
    echo page::render(URI);
}
