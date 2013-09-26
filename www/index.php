<?php

include __DIR__ . "/../vendor/autoload.php";

use G\Silex\Application;

$app = new Application([
    'debug'     => true,
    'base.path' => __DIR__  . '/..',
]);

$app->run();