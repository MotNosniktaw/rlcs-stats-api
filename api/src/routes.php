<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/get-players', 'GetPlayersController');
    $app->get('/get-teams', 'GetTeamsController');
    $app->get('/get-player-info', 'GetPlayerInfoController');
    $app->get('/get-seasons', 'GetSeasonsController');
    $app->get('/get-team-info', 'GetTeamInfoController');

    $app->get('/', DisplayLoginController);
    $app->post('./home', DisplayHomeController);

    $app->post('./update-goals', 'UpdateGoalsController');
    $app->post('./update-assists', 'UpdateAssistsController');
    $app->post('./update-saves', 'UpdateSavesController');

};
