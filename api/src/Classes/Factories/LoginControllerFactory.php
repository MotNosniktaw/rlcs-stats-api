<?php

namespace Api\Factories;

use Api\Controllers\LoginController;
use Psr\Container\ContainerInterface;

class LoginControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $userModel = $container->get('UserModel');

        return new LoginController($userModel);
    }
}