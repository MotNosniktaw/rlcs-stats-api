<?php

namespace Api\Factories;

use Api\Controllers\GetSeasonsController;
use Psr\Container\ContainerInterface;

class GetSeasonsControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $statsModel = $container->get('StatsModel');

        return new GetSeasonsController($statsModel);
    }
}