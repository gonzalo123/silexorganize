<?php

include __DIR__ . "/../vendor/autoload.php";

use G\Silex\Application;

$app = new Application();
$app['debug'] = true;

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views',
    ));

$app->get('/', function() use($app) {
        return $app->render('home.twig');
    });

$app->get('/hello/{name}', function($name) use($app) {
        return $app['twig']->render('hello.twig', ['name' => $name]);
    });

$app->run();