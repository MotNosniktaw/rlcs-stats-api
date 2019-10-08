<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/players', 'GetPlayersController');
    $app->post('/players', 'AddPlayerController');
    $app->put('/players', 'UpdatePlayerController');
    $app->delete('/players', DeletePlayerController);
    $app->get('/players/{id}', 'GetPlayerInfoController');

    $app->get('/teams', 'GetTeamsController');
    $app->post('/teams', 'AddTeamController');
    $app->put('/teams', 'UpdateTeamController');
    $app->delete('/teams', DeleteTeamController);
    $app->get('/teams/{id}', 'GetTeamInfoController');

    $app->get('/seasons', 'GetSeasonsController');
    $app->post('/seasons', 'AddSeasonController');
    $app->put('/seasons', 'UpdateSeasonController');

    $app->get('/', DisplayLoginController);
    $app->get('/home', DisplayHomeController);

    $app->post('/login', 'LoginController');
    $app->post('/new-user', 'NewUserController');
};
