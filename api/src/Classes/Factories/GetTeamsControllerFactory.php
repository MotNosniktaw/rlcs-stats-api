<?php

namespace Api\Factories;

use Api\Controllers\GetTeamsController;
use Psr\Container\ContainerInterface;

class GetTeamsControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $statsModel = $container->get('StatsModel');
        return new GetTeamsController($statsModel);
    }
}