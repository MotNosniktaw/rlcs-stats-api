<?php

namespace Api\Controllers;

use Api\Models\StatsModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetSeasonsController
{
    protected $statsModel;

    public function __construct(StatsModel $statsModel)
    {
        $this->statsModel = $statsModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $data = $this->statsModel->getSeasons();

        return $response->withJSON($data);
    }
}