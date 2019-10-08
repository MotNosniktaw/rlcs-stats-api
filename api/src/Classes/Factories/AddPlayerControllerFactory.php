<?php

namespace Api\Factories;

use Api\Controllers\AddPlayerController;
use Psr\Container\ContainerInterface;

class AddPlayerControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $statsModel = $container->get('StatsModel');
        return new AddPlayerController($statsModel);
    }
}