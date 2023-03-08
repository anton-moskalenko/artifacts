<?php

define('ROOT_DIR', __DIR__);

session_start();
include_once __DIR__ . '/vendor/autoload.php';

$config = include __DIR__ . '/Setup/Config.php';
echo (new Liloi\Nexus\Engine\Application($config))->compile();