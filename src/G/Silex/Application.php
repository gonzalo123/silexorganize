<?php

namespace G\Silex;

use Silex\Application as SilexApplication;
use Silex\Application\TwigTrait;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;

class Application extends SilexApplication
{
    use TwigTrait;

    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->registerServices();
        $this->setUpRoutes();
    }

    public function registerServices()
    {
        $this->register(new SessionServiceProvider());
        $this->register(new TwigServiceProvider(), [
                'twig.path' => $this['base.path'] .'/views',
            ]);
    }

    public function setupRoutes()
    {
        $this->get('/', function() {
                return $this->render('home.twig');
            });

        $this->get('/hello/{name}', function($name) {
                return $this->render('hello.twig', ['name' => $name]);
            });
    }
}