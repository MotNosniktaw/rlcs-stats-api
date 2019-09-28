<?php

namespace Api\Factories;

use Api\Models\StatsModel;
use Psr\Container\ContainerInterface;

class StatsModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('db');
        return new StatsModel($db);
    }
}