<?php

/*

// Database.php example:

use Liloi\Config\Pool;
use Liloi\Config\Sparkle;

(function () {Pool::getSingleton()->set(new Sparkle('prefix', function () {return 'rune_';}));})();

(function() {
    $connection = ['host'=>'localhost','user'=>'user','password'=>'password','database'=>'database'];

    Pool::getSingleton()->set(new Sparkle('connection', function () use ($connection) {
        return $connection;
    }));
})();

 */

use Liloi\Config\Pool;

include __DIR__ . '/Database.php';
include __DIR__ . '/Default.php';

return Pool::getSingleton();