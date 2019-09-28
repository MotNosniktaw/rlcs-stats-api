<?php

namespace Api\Factories;

use Api\Controllers\GetPlayersController;

class GetPlayersControllerFactory
{
    public function __invoke($container)
    {
        $statsModel = $container->get('StatsModel');
        return new GetPlayersController($statsModel);
    }
}