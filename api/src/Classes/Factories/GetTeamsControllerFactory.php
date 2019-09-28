<?php

namespace Api\Factories;

use Api\Controllers\GetTeamsController;

class GetTeamsControllerFactory
{
    public function __invoke($container)
    {
        $statsModel = $container->get('StatsModel');
        return new GetTeamsController($statsModel);
    }
}