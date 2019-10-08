<?php

namespace Api\Factories;

use Api\Controllers\AddTeamController;
use Interop\Container\ContainerInterface;

class AddTeamControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $statsModel = $container->get('StatsModel');
        return new AddTeamController($statsModel);
    }
}