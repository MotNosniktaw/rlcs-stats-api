<?php

namespace Api\Factories;

use Api\Models\UserModel;

class UserModelFactory
{
    public function __invoke($container)
    {
        $db = $container->get('db');
        return new UserModel($db);
    }
}