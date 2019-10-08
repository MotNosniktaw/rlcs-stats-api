<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/players', 'GetPlayersController');
    $app->post('/players', 'AddPlayerController');
    $app->put('/players', 'UpdatePlayerController');

    $app->get('/teams', 'GetTeamsController');
    $app->post('/teams', 'AddTeamController');
    $app->put('/teams', 'UpdateTeamController');

    $app->get('/get-player-info', 'GetPlayerInfoController');
    $app->get('/get-seasons', 'GetSeasonsController');
    $app->get('/get-team-info', 'GetTeamInfoController');

    $app->get('/', DisplayLoginController);
    $app->get('/home', DisplayHomeController);

    $app->post('/login', 'LoginController');
    $app->post('/new-user', 'NewUserController');
};
