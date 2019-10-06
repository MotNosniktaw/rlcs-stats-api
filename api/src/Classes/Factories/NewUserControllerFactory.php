<?php

namespace Api\Factories;

use Api\Controllers\NewUserController;
use Psr\Container\ContainerInterface;

class NewUserControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $userModel = $container->get('UserModel');
        return new NewUserController($userModel);
    }
}