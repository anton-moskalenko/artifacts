<?php

define('DEV', true);
define('ROOT_DIR', __DIR__);

session_start();
include_once __DIR__ . '/vendor/autoload.php';

$config = include __DIR__ . '/Setup/Config.php';
echo (new Liloi\Rune\Engine\Application($config))->compile();