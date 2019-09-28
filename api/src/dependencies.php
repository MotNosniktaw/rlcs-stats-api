<?php

use Api\Factories\GetPlayersControllerFactory;
use Api\Factories\GetTeamsControllerFactory;
use Api\Factories\StatsModelFactory;
use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['db'] = function ($container) {
        $dbconfig = $container->get('settings')['db-config'];
        $db = new \PDO('mysql:host=' . $dbconfig['host'] . '; dbname=' . $dbconfig['dbname'], $dbconfig['user'], $dbconfig['password']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    $container['StatsModel'] = new StatsModelFactory;
    $container['GetPlayersController'] = new GetPlayersControllerFactory;
    $container['GetTeamsController'] = new GetTeamsControllerFactory;

};
