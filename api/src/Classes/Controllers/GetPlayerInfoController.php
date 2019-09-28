<?php

namespace Api\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class GetPlayerInfoController
{
    protected $statsModel;

    public function __construct($statsModel)
    {
        $this->statsModel = $statsModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $playerID = $request->getParam('player-id');

        $data = $this->statsModel->getPlayerInfo($playerID);

        return $response->withJson($data);
    }

}