<?php

use Liloi\Config\Pool;
use Liloi\Config\Sparkle;

(function() {
    Pool::getSingleton()->set(new Sparkle('default', function () {
        return ['url' => '/interstate'];
    }));
})();