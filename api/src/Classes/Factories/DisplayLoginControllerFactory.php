<?php

namespace Api\Factories;

use Api\Controllers\DisplayLoginController;
use Psr\Container\ContainerInterface;

class DisplayLoginControllerFactory
{
    public function __invoke(ContainerInterface $container): DisplayLoginController
    {
        $renderer = $container->get('renderer');
        $statsModel = $container->get('StatsModel');
        return new DisplayLoginController($renderer, $statsModel);
    }
}