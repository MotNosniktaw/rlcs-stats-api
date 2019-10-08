<?php

namespace Api\Controllers;

use Api\Entities\TeamEntity;
use Api\Models\StatsModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddTeamController
{
    private $statsModel;

    public function __construct(StatsModel $statsModel)
    {
        $this->statsModel = $statsModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $data = [
            'success' = false,
            'msg' = 'It no work!',
            'code' = 400
        ];
        $team = new TeamEntity($request['name'], $request['region']);
        $result = $this->statsModel->addTeam($team);

        if ($result) {
            $data['success'] = true;
            $data['msg'] = 'yaaaaay!';
            $data['code'] = 200;
        }

        return $response->withJSON($data);
    }
}