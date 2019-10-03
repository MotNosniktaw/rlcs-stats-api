<?php

namespace Api\Controllers;

use Api\Models\StatsModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetTeamsController
{
    protected $statsModel;

    public function __construct(StatsModel $statsModel)
    {
        $this->statsModel = $statsModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $data = $this->statsModel->getTeams();

        return $response->withJSON($data);
    }
}