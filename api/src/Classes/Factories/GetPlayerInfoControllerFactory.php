<?php

namespace Api\Factories;

use Api\Controllers\GetPlayerInfoController;

class GetPlayerInfoControllerFactory
{
    public function __invoke($container)
    {
        $statsModel = $container->get('StatsModel');

        return new GetPlayerInfoController($statsModel);
    }
}