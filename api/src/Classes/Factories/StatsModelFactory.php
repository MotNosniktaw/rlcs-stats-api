<?php

namespace Api\Factories;

use Api\Models\StatsModel;

class StatsModelFactory
{
    public function __invoke($container)
    {
        $db = $container->get('db');
        return new StatsModel($db);
    }
}