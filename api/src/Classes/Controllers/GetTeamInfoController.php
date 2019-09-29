<?php

namespace Api\Controllers;

use Api\Models\StatsModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetTeamInfoController
{
    protected $statsModel;

    public function __construct(StatsModel $statsModel)
    {
        $this->statsModel = $statsModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $teamID = $request->getParam('team-id');
        $data = [];
        $data['team'] = $this->statsModel->getTeamInfo($teamID);
        $data['players'] = $this->statsModel->getPlayersByTeam($teamID);

        return $response->withJSON($data);
    }
}