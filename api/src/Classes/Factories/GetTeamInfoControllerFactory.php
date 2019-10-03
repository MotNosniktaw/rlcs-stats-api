<?php

namespace Api\Factories;

use Api\Controllers\GetTeamInfoController;
use Psr\Container\ContainerInterface;

class GetTeamInfoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $statsModel = $container->get('StatsModel');
        return new GetTeamInfoController($statsModel);
    }
}