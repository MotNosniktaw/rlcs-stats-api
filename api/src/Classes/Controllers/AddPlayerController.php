<?php

namespace Api\Controllers;

use Api\Entities\PlayerEntity;
use Api\Models\StatsModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddPlayerController
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
        $player = new PlayerEntity($request['name'], $request['team']);
        $result = $this->statsModel->addPlayer($player);

        if ($result) {
            $data['success'] = true;
            $data['msg'] = 'yaaaaay!';
            $data['code'] = 200;
        }

        return $response->withJSON($data);
    }
}