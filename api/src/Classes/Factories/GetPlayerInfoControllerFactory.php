<?php

namespace Api\Factories;

use Api\Controllers\GetPlayerInfoController;
use Psr\Container\ContainerInterface;

class GetPlayerInfoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $statsModel = $container->get('StatsModel');

        return new GetPlayerInfoController($statsModel);
    }
}