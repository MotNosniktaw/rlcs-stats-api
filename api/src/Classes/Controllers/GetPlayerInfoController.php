<?php

namespace Api\Controllers;

use Api\Models\StatsModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetPlayerInfoController
{
    protected $statsModel;

    public function __construct(StatsModel $statsModel)
    {
        $this->statsModel = $statsModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {

        $playerID = $args['id'];

        $data = $this->statsModel->getPlayerInfo($playerID);

        return $response->withJson($data);
    }

}