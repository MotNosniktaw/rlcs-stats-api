<?php

namespace Api\Factories;

use Api\Controllers\GetPlayersController;
use Psr\Container\ContainerInterface;

class GetPlayersControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $statsModel = $container->get('StatsModel');
        return new GetPlayersController($statsModel);
    }
}