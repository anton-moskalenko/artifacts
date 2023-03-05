<?php

use Liloi\Config\Pool;
use Liloi\Config\Sparkle;

// Default URL (URL that would be base for Nexus application)
(static function() {
    Pool::getSingleton()->set(new Sparkle('default', function () {
        return ['url' => '/'];
    }));
})();